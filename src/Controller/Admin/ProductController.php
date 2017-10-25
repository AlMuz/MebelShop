<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class ProductController extends AppController
{

  public function index()
  {
      $this->paginate = [
          'contain' => ['Category','Material'],
          'order' => [
              'Product.idProduct' => 'asc'
          ],
          'limit' => 10,
      ];
      $product = $this->paginate($this->Product);

      $this->set(compact('product'));
  }

  public function view($id = null)
  {
      $product = $this->Product->get($id, [
          'contain' => ['Category', 'Image','Material']
      ]);

      $this->set('product', $product);
  }

  public function add()
  {
    $product = $this->Product->newEntity();
    if ($this->request->is('post')) {
        $product = $this->Product->patchEntity($product, $this->request->getData());
        $data = $this->request->data;
        if($data['MainImage']['name']){
          // calling function which renames uploaded pic name
					$filename = $this->Product->savefile($data);
					$product->MainImage = $filename;
          // saving it in DB
					$result = $this->Product->save($product);
					if($result) {
            $this->Flash->success(__('The product has been saved.'));
            return $this->redirect(['action' => 'index']);
					}
          else{
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
          }
				}
    }

      // make list of category for product
    $category = $this->Product->Category->find('list',['keyField' => 'idCategory',
    'valueField' => 'Title']);
      // make list of material for product
    $material = $this->Product->Material->find('list',['keyField' => 'idMaterial',
    'valueField' => 'Title']);

    $this->set(compact('product','category','material'));

  }

  public function edit($id = null)
  {
      $product = $this->Product->get($id, [
          'contain' => ['Category', 'Image','Material']
      ]);
      if ($this->request->is(['patch', 'post', 'put'])) {
        $oldpic = $product['MainImage'];
        $product = $this->Product->patchEntity($product, $this->request->getData());
        $data = $this->request->data;
        // checking - changed something or not
        if(!empty($data['MainImage']['name'])){
          // if changed image - deleting old image
          unlink(WWW_ROOT.'img/'.$oldpic);
          $filename = $this->Product->savefile($data);
          $product->MainImage = $filename;
          $result = $this->Product->save($product);
          if($result) {
            $this->Flash->success(__('The product has been updated.'));
            return $this->redirect(['action' => 'index']);
          }
          else{
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
          }
        }else {
          // else just changing another content
          $product->MainImage = $oldpic;
          $result = $this->Product->save($product);
          if($result) {
            $this->Flash->success(__('The product has been updated.'));
            return $this->redirect(['action' => 'index']);
          }
          else{
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
          }
        }
      }

      // make list of category for product
      $category = $this->Product->Category->find('list',['keyField' => 'idCategory',
      'valueField' => 'Title']);
      // make list of material for product
      $material = $this->Product->Material->find('list',['keyField' => 'idMaterial',
      'valueField' => 'Title']);

      $this->set(compact('product','category','material'));
  }

  public function delete($id = null)
  {
      $this->request->allowMethod(['post', 'delete']);
      $product = $this->Product->get($id);
      unlink(WWW_ROOT.'img/'.$product->MainImage);
      if ($this->Product->delete($product)) {
          $this->Flash->success(__('The product has been deleted.'));
      } else {
          $this->Flash->error(__('The product could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
  }
}
