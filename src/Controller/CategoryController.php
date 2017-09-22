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

  public $paginate = [
    'limit' => 15,
    'order' => [
      'Category.Title' => 'asc'
    ]
  ];

  public function index()
  {
      $category = $this->paginate($this->Category);

      $this->set(compact('category'));
      // $this->set('_serialize', ['category']);
  }

  public function view($id = null)
  {
      $category = $this->paginate($this->Category);
      $category = $this->Category->get($id, [
          'contain' => ['Product']
      ]);

      $this->set('category', $category);
      // $this->set('_serialize', ['category']);
  }
}
