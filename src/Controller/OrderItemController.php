<?php
namespace App\Controller;

use App\Controller\AppController;


class OrderItemController extends AppController
{

    public function index()
    {
      return $this->redirect('/');
    }

    public function view($id = null)
    {
        $orderItem = $this->OrderItem->get($id, [
            'contain' => ['Orders','Product']
        ]);

        $this->set('orderItem', $orderItem);
    }

}
