<?php
namespace App\Controller;

use App\Controller\AppController;

class OrdersController extends AppController
{
    // /orders, shows all users orders and their status
    public function index()
    {
      $query = $this->Orders->find('all')
      ->where(['User_IdUser = ' => $this->Auth->user('idUser')]);
      $query = $this->paginate($query);
      $this->set('orders',$query);
    }

    // Show specific order and all order items in it /orders/view/(id)
    public function view($id = null)
    {
      if($id == null || $id == 0){
        $this->Flash->error('There are no this page');

        return $this->redirect('/orders');
      }

      $session = $this->request->session();
      $user_id  = $session->read('Auth.User.idUser');
      $order = $this->Orders->get($id, [
          'contain' => ['User', 'OrderItem']
      ]);

      if($user_id != $order->User_IdUser){
        $this->Flash->error('It is not your order!');
        return $this->redirect('/orders');
      }
      $this->set('order', $order);
    }

}
