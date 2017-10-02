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

    public function index()
    {
      $session = $this->request->session();

      $shop = $session->read('Shop');
      $this->set(compact('shop'));
    }

    public function clear() {
        $this->Cart->clear();
        $this->Flash->success(__('Cart successfully cleared'));
        return $this->redirect('/');
    }

    public function remove($id = null) {
        $product = $this->Cart->remove($id);
        if(!empty($product)) {
            $this->Flash->success($product['name'] . ' was removed from your shopping cart');
        }
        return $this->redirect(array('controller'=>'cart','action' => 'index'));
    }

    public function cartupdate() {
      $arr = array('Product' =>$this->request->data);
        if ($this->request->is('post')) {
            foreach($arr['Product'] as $key => $value) {
                $p = explode('-', $key);
                $p = explode('_', $p[1]);
                $this->Cart->add($p[0], $value);
                $this->Flash->success('Shopping Cart is updated.');
            }
        }
        return $this->redirect(array('action' => 'index'));
    }
}
