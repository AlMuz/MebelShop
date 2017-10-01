<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


class ProductController extends AppController
{
  public function initialize()
  {
      parent::initialize();
      $this->loadComponent('Cart');
  }

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
  }

  public function view($id = null)
  {
      $product = $this->Product->get($id, [
          'contain' => ['Image','Category']
      ]);

      $this->set('category', 'category');
      $this->set('product', $product);
  }

  public function search(){
    $search = null;
    if(!empty($this->request->query['search']) || !empty($this->request->data['name'])) {
        $search = empty($this->request->query['search']) ? $this->request->data['name'] : $this->request->query['search'];

        $search = preg_replace('/[^a-zA-Z0-9 ]/', '', $search);
        $terms = explode(' ', trim($search));
        $terms = array_diff($terms, array(''));

        foreach($terms as $term) {
            $conditions[] = array("OR" => array (
              'Product.Name LIKE' => '%' . $term . '%',
              'Product.Description LIKE' => '%' . $term . '%'
            ));
        }

        $products = $this->Product->find('all', array(
            'recursive' => -1,
            'conditions' => $conditions,
            'limit' => 200,
        ));
        $this->set(compact('products'));
    }
    $this->set(compact('search'));
  }

  public function add()
  {
    if ($this->request->is('post')) {

        $id = $this->request->data['product_id'];

        $quantity = 1;

        $product = $this->Cart->add($id, $quantity);

    }
    if(!empty($product)) {
        $this->Flash->success($product['Product']['name'] . ' was added to your shopping cart.');
    } else {
        $this->Flash->danger('Unable to add this product to your shopping cart.');
    }
    $this->redirect($this->referer());
  }
}
