<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class ProductController extends AppController
{
  // public $paginate = [
  //   'order' => [
  //     'Product.Name' => 'asc'
  //   ]
  // ];

  public function index()
  {
      $this->paginate = [
          'contain' => ['Category'],
          'order' => [
              'Product.idProduct' => 'asc'
          ]
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
        $data = $this->request->data;

        if($data['MainImage']['name']){
					$filename = $this->Product->savefile($data);

					$product->MainImage = $filename;
					$result = $this->Product->save($product);
					if($result) {
            $this->Flash->success(__('The product has been saved.'));

            return $this->redirect(['action' => 'index']);
					}
				}
    }
    // $category = $this->Product->Category->find('all');
    $this->set(compact('product','category'));
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
      unlink(WWW_ROOT.'img/'.$product->MainImage);
      if ($this->Product->delete($product)) {
          $this->Flash->success(__('The product has been deleted.'));
      } else {
          $this->Flash->error(__('The product could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
  }
}
