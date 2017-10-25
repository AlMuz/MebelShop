<?php
namespace App\Controller\admin;

use App\Controller\AppController;


class OrderItemController extends AppController
{

    public function index()
    {
      return $this->redirect('/');
    }

    // show specific order item from order
    public function view($id = null)
    {
        $orderItem = $this->OrderItem->get($id, [
            'contain' => ['Orders','Product']
        ]);

        $this->set('orderItem', $orderItem);
    }

}
