<?php
namespace App\Controller;

use App\Controller\AppController;


class CategoryController extends AppController
{
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
        $this->set('_serialize', ['category']);
    }

    public function view($id = null)
    {
      $this->paginate=['limit' => 15
      // 'order' => [
      //     'Category.Title' => 'asc']
        ];

        $category = $this->paginate($this->Category);
        $category = $this->Category->get($id, [
            'contain' => ['Product']
        ]);

        $this->set('category', $category);
        $this->set('_serialize', ['category']);
    }
}
