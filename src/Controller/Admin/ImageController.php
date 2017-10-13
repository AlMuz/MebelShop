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
        $data = $this->request->data;
        if($data['Image']['name']){
  				$filename = $this->Image->savefile($data);
          $image->Image = $filename;
  				$result = $this->Image->save($image);
  				if($result) {
            $this->Flash->success(__('The Image has been saved.'));
            return $this->redirect(['action' => 'index']);
  				}
          else{
            $this->Flash->error(__('The Image could not be saved. Please, try again.'));
          }
  			}
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
        unlink(WWW_ROOT.'img/'.$image->Image);
        $image = $this->Image->patchEntity($image, $this->request->getData());
        $data = $this->request->data;
        if($data['Image']['name']){
          $filename = $this->Image->savefile($data);
          $image->Image = $filename;
          $result = $this->Image->save($image);
          if($result) {
            $this->Flash->success(__('The image has been saved.'));
            return $this->redirect(['action' => 'index']);
          }
          else{
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
          }
        }
      }
      $product = $this->Product->find('list',['keyField' => 'idProduct',
      'valueField' => 'Name']);
      $this->set(compact('image','product'));
  }

  public function delete($id = null)
  {
      $this->request->allowMethod(['post', 'delete']);
      $image = $this->Image->get($id);
      unlink(WWW_ROOT.'img/'.$image->Image);
      if ($this->Image->delete($image)) {
          $this->Flash->success(__('The image has been deleted.'));
      } else {
          $this->Flash->error(__('The image could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
  }
}
