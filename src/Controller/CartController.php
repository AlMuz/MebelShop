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
    // array to show this year and plus ten years in future
    $years =array_combine(range(date('y'), date('y') + 10), range(date('Y'), date('Y') + 10));
    // array for months
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
      // loading model User
      $this->loadModel('User');
      // loading information about logged in user
      $query = $this->User->find('all')
      ->where(['User.idUser = ' => $this->Auth->user('idUser')]);
      $this->set('user',$query);
      $this->set(compact('shop'));
      $order_type = 'Creditcard';
      // saving information in session, what order type is Credit card
      $session->write('Shop.Order.'.'order_type', $order_type);
    }

    //cart/payment, page where user paying for his order
    public function payment(){
      $session = $this->request->session();
      $shop = $session->read('Shop');
      if(empty($shop)) {
          return $this->redirect('/orders');
      }
      $this->loadModel('User');
      $this->loadModel('Orders');
      $this->loadModel('OrderItem');
      $this->loadModel('Product');

      // loading information about logged in user
      $query = $this->User->find('all')
      ->where(['User.idUser = ' => $this->Auth->user('idUser')]);
      $this->set('user',$query);
      $this->set(compact('shop'));

      // saved cards for testing
      $cards=[
        '01'=>[ 'creditcard_number' => '4716108999716531', 'creditcard_code' => '257','creditcard_month' => '11','creditcard_year' => '17' ],
        '02'=>[ 'creditcard_number' => '5281037048916168', 'creditcard_code' => '043','creditcard_month' => '05','creditcard_year' => '18' ],
        '03'=>[ 'creditcard_number' => '342498818630298', 'creditcard_code' => '3156','creditcard_month' => '09','creditcard_year' => '18' ]
      ];

      $this->set('cards', $cards);

      $order = $this->Orders->newEntity();
      if ($this->request->is('post')) {
        if(isset($this->request->data['creditcard_number'])){
          $user = $query;
          // checking for testing card
          foreach ($cards as $cards) {
          if(($this->request->data['creditcard_number'] == $cards['creditcard_number'])
            && ($this->request->data['creditcard_code'] == $cards['creditcard_code'])
            && ($this->request->data['creditcard_year'] == $cards['creditcard_year'])
            && ($this->request->data['creditcard_month'] ==  $cards['creditcard_month'] )){
            // adding information for order
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            $order->User_IdUser = $this->Auth->user('idUser');
            // status -> ordered
            $order->Status = 0;
            $order->Weight = $shop['Order']['weight'];
            $order->Order_item_count = $shop['Order']['order_item_count'];
            $order->Total = $shop['Order']['total'];
            $order->Order_Type = $shop['Order']['order_type'];
            $order->Shipping = $this->request->data['Shipping'];
            // saving order
            if ($this->Orders->save($order)) {
              $idorder = $order->idOrder;
              foreach ($shop['OrderItem'] as  $item){
                // adding information for order items
                $orderItem = $this->OrderItem->newEntity();
                $orderItem = $this->OrderItem->patchEntity($orderItem, $this->request->getData());
                $orderItem->orders_idOrder = $idorder;
                $orderItem->Product_idProduct = $item['product_id'];
                $orderItem->quantity = $item['quantity'];
                $orderItem->price = $item['price'];
                $orderItem->sub_total = $item['total'];
                // saving all order items
                $this->OrderItem->save($orderItem);
              }
              // sending email to user
              $email = new Email('default');
              $email->transport('gmail');
              // getting data from request
              $subject = 'Your order successfully is ordered!';
              $msg = '
                <div style="width:800px; margin:0 auto;">
                  <h1> Hello, '.$this->Auth->user('Name').' '.$this->Auth->user('Surname').'! </h1>
                  <h2> Order status: Ordered </h2>
                  Order item count: '.$order['Order_item_count'].'
                  <br> There are all your products which you ordered:
                  <br>
                  <table style="border:1px black solid">
                    <thead>
                      <tr>
                        <th style="padding-right: 15px">Product Name</th>
                        <th style="padding-right: 15px">Quantity</th>
                        <th style="padding-right: 15px">Price </th>
                        <th style="padding-right: 15px">Sub total </th>
                      </tr>
                    </thead>
                    <tbody>';
              // typing all product which were in cart
              foreach($shop['OrderItem'] as  $item) {
                $query = $this->Product->find('all')
                ->where(['Product.idProduct = ' => $item['product_id']]);
                $this->set('product',$query);
                foreach ($query as $product) {
                  $msg .='
                    <tr style="border:1px black solid">
                      <td style="padding-right: 5px; padding-left: 5px;">'.$product['Name'].'</td>
                      <td style="padding-right: 5px; padding-left: 5px;">'.$item['quantity'].'</td>
                      <td style="padding-right: 5px; padding-left: 5px;">'.$item['price'].' €</td>
                      <td style="padding-right: 5px; padding-left: 5px;">'.$item['total'].' €</td>
                    </tr>';
                }
               }
               $msg .= '
                    </tbody>
                 </table>
                 Total price: <b>'.$shop['Order']['total']. '</b> €
                 <br> Total price without 21% VAT(PVN): <b>'.sprintf('%01.2f',($shop['Order']['total']/1.21)) .'</b> €
                 <br> Thank you for your order! We hope you will buy something new later!
                 <br> <h2><a href="http://onlineshop.mendo.lv/"> MuzInterior</a> Online Store </h2>
               </div>';
              //  sending email to the user
              try {
                $email
                     ->transport('gmail')
                     ->from(['teregan1996@gmail.com' => 'MuzInterior - Online shop'])
                     ->to($this->Auth->user('Email'))
                     ->subject($subject)
                     ->emailFormat('html')
                     ->viewVars(['msg' => $msg])
                     ->send($msg);
              } catch (Exception $e) {
                echo 'Exception : ',  $e->getMessage(), "\n";
              }

              $this->Flash->success(__('You ordered all'));
              // clearing all cart information and redirecting user to the orders page
              $this->Cart->clear();
              return $this->redirect('/orders/');
            }
          $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        else {
          $this->Flash->error(__('Credit number or something else is not right!'));
        }
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

    // function to remove chosen product
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
