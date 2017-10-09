<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Email\Email;

class CartController extends AppController
{
  public function initialize()
  {
      parent::initialize();
      $this->loadComponent('Cart');
      $years =array_combine(range(date('y'), date('y') + 10), range(date('Y'), date('Y') + 10));
      $months=[
          '01' => '01 - January',
          '02' => '02 - February',
          '03' => '03 - March',
          '04' => '04 - April',
          '05' => '05 - May',
          '06' => '06 - June',
          '07' => '07 - July',
          '08' => '08 - August',
          '09' => '09 - September',
          '10' => '10 - October',
          '11' => '11 - November',
          '12' => '12 - December'
      ];
      $this->set('months', $months);
      $this->set('years', $years);
  }

    // cart page, where are all information about products in cart
    public function index()
    {
      $session = $this->request->session();

      $shop = $session->read('Shop');
      $this->set(compact('shop'));
    }

    //Checking user information after press button ckeckout in cart/index
    public function checkout(){
      $session = $this->request->session();
      $shop = $session->read('Shop');
      if(!$shop['Order']['total']) {
          return $this->redirect('/');
      }

      $this->loadModel('User');
      $query = $this->User->find('all')
      ->where(['User.idUser = ' => $this->Auth->user('idUser')]);
      $this->set('user',$query);
      $this->set(compact('shop'));
      $order_type = 'Creditcard';
      $session->write('Shop.Order.'.'order_type', $order_type);
    }

    //cart/payment
    public function payment(){
      $session = $this->request->session();
      $shop = $session->read('Shop');
      if(empty($shop)) {
          return $this->redirect('/');
      }
      $this->loadModel('User');
      $this->loadModel('Orders');
      $this->loadModel('OrderItem');

      $query = $this->User->find('all')
      ->where(['User.idUser = ' => $this->Auth->user('idUser')]);
      $this->set('user',$query);
      $this->set(compact('shop'));

      $order = $this->Orders->newEntity();
      if ($this->request->is('post')) {
        if(isset($this->request->data['creditcard_number'])){
            if(($this->request->data['creditcard_number'] == 4716108999716531) && ($this->request->data['creditcard_code'] == 257) && ($this->request->data['creditcard_year'] == 17) && ($this->request->data['creditcard_month'] == 01 )){
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            $order->User_IdUser = $this->Auth->user('idUser');
            $order->Status = 0;
            $order->Weight = $shop['Order']['weight'];
            $order->Order_item_count = $shop['Order']['order_item_count'];
            $order->Total = $shop['Order']['total'];
            $order->Order_Type = $shop['Order']['order_type'];
            $order->Shipping = 1;
            if ($this->Orders->save($order)) {
              $idorder = $order->idOrder;
              foreach ($shop['OrderItem'] as  $item){
                $orderItem = $this->OrderItem->newEntity();
                $orderItem = $this->OrderItem->patchEntity($orderItem, $this->request->getData());
                $orderItem->orders_idOrder = $idorder;
                $orderItem->idProduct = $item['product_id'];
                $orderItem->quantity = $item['quantity'];
                $orderItem->price = $item['price'];
                $orderItem->sub_total = $item['total'];
                $this->OrderItem->save($orderItem);
              }
              $this->Flash->success(__('You ordered all'));
              $this->Cart->clear();
              return $this->redirect('/');
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
          }
          else {
            $this->Flash->error(__('Credit number or something else is not right!'));
          }
        }
      }
    }

    // function to clear all cart
    public function clear() {
        // call cart Component function
        $this->Cart->clear();
        $this->Flash->success(__('Cart successfully cleared'));
        return $this->redirect('/');
    }

    // function to clear all cart
    public function clearOrderType() {
        // call cart Component function
        $this->Cart->clearOrderType();
        $this->Flash->success(__('You changed order type'));
        return $this->redirect('/cart');
    }

    // function to remove choosen product
    public function remove($id = null) {
        // call cart Component function
        $product = $this->Cart->remove($id);
        if(!empty($product)) {
            $this->Flash->success($product['name'] . ' was removed from your shopping cart');
        }
        return $this->redirect(['controller'=>'cart','action' => 'index']);
    }

    // function to update product quantity  in cart
    public function cartupdate() {
      $arr = ['Product' =>$this->request->data];
        if ($this->request->is('post')) {
            foreach($arr['Product'] as $key => $value) {
                // this part catch from array product id to update specific product
                $p = explode('-', $key);
                $p = explode('_', $p[1]);
                $this->Cart->add($p[0], $value);
                $this->Flash->success('Shopping Cart is updated.');
            }
        }
        return $this->redirect(['action' => 'index']);
    }
}
