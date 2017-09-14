<?php
namespace App\Controller;

use App\Controller\AppController;


class ProductController extends AppController
{

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
        $this->set('_serialize', ['product']);
    }

    public function view($id = null)
    {
        $product = $this->Product->get($id, [
            'contain' => ['Image']
        ]);

        // $category = $this->Product->Category->find('all',
        // array('conditions' => array('Category.idCategory' => '1')));
        // $this->set('category', 'category');
        // debug($category);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }
}
