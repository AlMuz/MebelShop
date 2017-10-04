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
  // allow to not authorized users access to all product pages

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

  // Main page
  public function index()
  {
      $product = $this->paginate($this->Product);

      $this->set(compact('product'));
  }

  // specific product view
  public function view($id = null)
  {
      $product = $this->Product->get($id, [
          'contain' => ['Image','Category','Material']
      ]);

      $this->set('category', 'category');
      $this->set('product', $product);
  }

  // search page
  public function search(){
    $search = null;
    if(!empty($this->request->query['search']) || !empty($this->request->data['name'])) {
        $search = empty($this->request->query['search']) ? $this->request->data['name'] : $this->request->query['search'];
        // checking for bad simbols. can be only alphabet and digits
        $search = preg_replace('/[^a-zA-Z0-9 ]/', '', $search);
        $terms = explode(' ', trim($search));
        $terms = array_diff($terms, array(''));

        // condition for the query
        foreach($terms as $term) {
            $conditions[] = array("OR" => array (
              'Product.Name LIKE' => '%' . $term . '%',
              'Product.Description LIKE' => '%' . $term . '%'
            ));
        }

        $product = $this->Product->find('all', array(
            'recursive' => -1,
            'conditions' => $conditions,
            'limit' => 200,
        ));
        $this->set(compact('product'));
    }
    $this->set(compact('search'));
  }

  // function which add specific product and quantity to the cart
  public function add()
  {
    if ($this->request->is('post')) {
        $id = $this->request->data['product_id'];
        $quantity =$this->request->data['quantity'] ;
        $product = $this->Cart->add($id, $quantity);
    }
    
    if(!empty($product)) {
        $this->Flash->success($product->Name. ' was added to your shopping cart.');
    } else {
        $this->Flash->error('Unable to add this product to your shopping cart.');
    }
    $this->redirect($this->referer());
  }
}
