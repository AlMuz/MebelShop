<?php
namespace App\Controller;

use App\Controller\AppController;

class OrdersController extends AppController
{

    public function index()
    {
      $query = $this->Orders->find('all')
      ->where(['User_IdUser = ' => $this->Auth->user('idUser')]);
      $query = $this->paginate($query);
      $this->set('orders',$query);
    }

    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['User', 'OrderItem']
        ]);

        $this->set('order', $order);
    }

}
