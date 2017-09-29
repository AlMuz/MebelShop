<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class ImageController extends AppController
{

  public function index()
  {
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

 public function add()
  {
      $image = $this->Image->newEntity();

      if ($this->request->is('post')) {
        debug($this->request->data);
        // die();
          $image = $this->Image->patchEntity($image, $this->request->getData());

          if ($this->Image->save($image)) {
              $this->Flash->success(__('The image has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The image could not be saved. Please, try again.'));
      }
      $this->set(compact('image'));
  }

  public function edit($id = null)
  {
      $image = $this->Image->get($id, [
          'contain' => []
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
          $image = $this->Image->patchEntity($image, $this->request->getData());
          if ($this->Image->save($image)) {
              $this->Flash->success(__('The image has been saved.'));

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('The image could not be saved. Please, try again.'));
      }
      $this->set(compact('image'));
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
