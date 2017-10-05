<?php
namespace App\Controller;

use App\Controller\AppController;

class CartController extends AppController
{
  public function initialize()
  {
      parent::initialize();
      $this->loadComponent('Cart');
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
    }

    //
    public function payment(){
      $session = $this->request->session();
      $shop = $session->read('Shop');

      if(empty($shop)) {
          return $this->redirect('/');
      }
    }

    // function to clear all cart
    public function clear() {
        // call cart Component function
        $this->Cart->clear();
        $this->Flash->success(__('Cart successfully cleared'));
        return $this->redirect('/');
    }

    // function to remove choosen product
    public function remove($id = null) {
        // call cart Component function
        $product = $this->Cart->remove($id);
        if(!empty($product)) {
            $this->Flash->success($product['name'] . ' was removed from your shopping cart');
        }
        return $this->redirect(array('controller'=>'cart','action' => 'index'));
    }

    // function to update product quantity  in cart
    public function cartupdate() {
      $arr = array('Product' =>$this->request->data);
        if ($this->request->is('post')) {
            foreach($arr['Product'] as $key => $value) {
                // this part catch from array product id to update specific product
                $p = explode('-', $key);
                $p = explode('_', $p[1]);
                $this->Cart->add($p[0], $value);
                $this->Flash->success('Shopping Cart is updated.');
            }
        }
        return $this->redirect(array('action' => 'index'));
    }
}
