<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


class ProductController extends AppController
{
  public function beforeFilter(Event $event)
  {
      parent::beforeFilter($event);
      $this->Auth->allow();
  }
  
  public $paginate = [
    'limit' => 15,
    'order' => [
      'Product.Interest' => 'desc'
    ]
  ];

  public function index()
  {

      $product = $this->paginate($this->Product);

      $this->set(compact('product'));
      // $this->set('_serialize', ['product']);
  }

  public function view($id = null)
  {
      $product = $this->Product->get($id, [
          'contain' => ['Image','Category']
      ]);

      $this->set('category', 'category');
      $this->set('product', $product);
      // $this->set('_serialize', ['product']);
  }
}
