<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


class CategoryController extends AppController
{

  public function beforeFilter(Event $event)
  {
      parent::beforeFilter($event);
      $this->Auth->allow();
  }

  public function index()
  {
      $category = $this->paginate($this->Category, [
          'limit' => 15,
          'order' => [
              'Category.Title' => 'asc'
          ]
      ]);

      $this->set(compact('category'));
  }

  public function view($id = null)
  {
      $this->loadModel('Product');

      $query = $this->Product->find('all')
        ->where(['Product.Category_idCategory = ' => $id]);
      $product = $this->paginate($query,[
        'limit' => 15,
        'order' => [
          'Product.Interest' => 'desc'
        ]
      ]);

      $category = $this->Category->get($id);

      $this->set('category', $category);
      $this->set('product', $product);

  }
}
