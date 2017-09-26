<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class ProductController extends AppController
{
  public function index()
  {
      $this->paginate = [
          'contain' => ['Category']
      ];
      $product = $this->paginate($this->Product);

      $this->set(compact('product'));
  }

  public function view($id = null)
  {
      $product = $this->Product->get($id, [
          'contain' => ['Category', 'Image']
      ]);

      $this->set('product', $product);
  }

  public function add()
  {
    $product = $this->Product->newEntity();
    if ($this->request->is('post')) {
        $product = $this->Product->patchEntity($product, $this->request->getData());
        if ($this->Product->save($product)) {
            $this->Flash->success(__('The product has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The product could not be saved. Please, try again.'));
    }
    debug($product);
    $this->set(compact('product'));
  }

  public function edit($id = null)
  {
      $product = $this->Product->get($id, [
          'contain' => ['Category', 'Image']
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
          $product = $this->Product->patchEntity($product, $this->request->getData());
          if ($this->Product->save($product)) {
              $this->Flash->success(__('The product has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The product could not be saved. Please, try again.'));
      }
      $categories = $this->Product->Category->find('list');
      $this->set(compact('product','categories'));
  }

  public function delete($id = null)
  {
      $this->request->allowMethod(['post', 'delete']);
      $product = $this->Product->get($id);
      if ($this->Product->delete($product)) {
          $this->Flash->success(__('The product has been deleted.'));
      } else {
          $this->Flash->error(__('The product could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
  }
}
