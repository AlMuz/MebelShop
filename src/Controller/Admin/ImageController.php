<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class ImageController extends AppController
{

  public function index()
  {
      $this->paginate = [
          'limit' => 10,
      ];

      $image = $this->paginate($this->Image,[
          'contain' => ['Product']
      ]);
      $this->set(compact('image'));
  }


  public function view($id = null)
  {
      $image = $this->Image->get($id, [
          'contain' => []
      ]);

      $this->set('image', $image);
  }

 public function add($id = null)
  {
      $image = $this->Image->newEntity();
      $this->loadModel('Product');

      if ($this->request->is('post')) {

          $image = $this->Image->patchEntity($image, $this->request->getData());

          if ($this->Image->save($image)) {
              $this->Flash->success(__('The image has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The image could not be saved. Please, try again.'));
      }
      $product = $this->Product->find('list',['keyField' => 'idProduct',
      'valueField' => 'Name']);
      $value = $id;
      $this->set(compact('image','product','value'));
  }

  public function edit($id = null)
  {
      $image = $this->Image->get($id, [
          'contain' => []
      ]);
        $this->loadModel('Product');
      if ($this->request->is(['patch', 'post', 'put'])) {
          $image = $this->Image->patchEntity($image, $this->request->getData());
          if ($this->Image->save($image)) {
              $this->Flash->success(__('The image has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The image could not be saved. Please, try again.'));
      }
      $product = $this->Product->find('list',['keyField' => 'idProduct',
      'valueField' => 'Name']);
      $this->set(compact('image','product'));
  }

  public function delete($id = null)
  {
      $this->request->allowMethod(['post', 'delete']);
      $image = $this->Image->get($id);
      if ($this->Image->delete($image)) {
          $this->Flash->success(__('The image has been deleted.'));
      } else {
          $this->Flash->error(__('The image could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
  }
}
