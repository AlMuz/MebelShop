<?php
namespace App\Controller;

use App\Controller\AppController;


class OrderItemController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders']
        ];
        $orderItem = $this->paginate($this->OrderItem);

        $this->set(compact('orderItem'));
    }

    public function view($id = null)
    {
        $orderItem = $this->OrderItem->get($id, [
            'contain' => ['Orders']
        ]);

        $this->set('orderItem', $orderItem);
    }

    public function add()
    {
        $orderItem = $this->OrderItem->newEntity();
        if ($this->request->is('post')) {
            $orderItem = $this->OrderItem->patchEntity($orderItem, $this->request->getData());
            if ($this->OrderItem->save($orderItem)) {
                $this->Flash->success(__('The order item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order item could not be saved. Please, try again.'));
        }
        $orders = $this->OrderItem->Orders->find('list', ['limit' => 200]);
        $this->set(compact('orderItem', 'orders'));
    }

    public function edit($id = null)
    {
        $orderItem = $this->OrderItem->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderItem = $this->OrderItem->patchEntity($orderItem, $this->request->getData());
            if ($this->OrderItem->save($orderItem)) {
                $this->Flash->success(__('The order item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order item could not be saved. Please, try again.'));
        }
        $orders = $this->OrderItem->Orders->find('list', ['limit' => 200]);
        $this->set(compact('orderItem', 'orders'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderItem = $this->OrderItem->get($id);
        if ($this->OrderItem->delete($orderItem)) {
            $this->Flash->success(__('The order item has been deleted.'));
        } else {
            $this->Flash->error(__('The order item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
