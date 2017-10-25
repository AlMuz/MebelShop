<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

// This is cart Component which saves information in session
class CartComponent  extends Component{

  public $controller;

  //  max quantity for product to add in cart
  public $maxQuantity = 99;

  //  loading product model
  public function initialize(array $config){
    $this->Product = TableRegistry::get('Product');
  }

  // adding product to the cart. quantity must be from 1 to 99.
  public function add($id, $quantity = 1) {
    $session = $this->request->session();

    // checking if quantity = null, it will be 1
    if(!is_numeric($quantity)) {
        $quantity = 1;
    }

    if($quantity > $this->maxQuantity) {
        $quantity = $this->maxQuantity;
    }

    //  if quantity less or equals 0 product will be removed from the cart
    if($quantity <= 0) {
        $this->remove($id);
        return;
    }

    $product = $this->Product->get($id);

    if(empty($product)) {
        return false;
    }

    // fetching data from database
    $data['product_id'] = $product->idProduct;
    $data['name'] = $product->Name;
    $data['weight'] = $product->Weight;
    $data['price'] = $product->Price;
    $data['quantity'] = $quantity;
    // formating  price like 0.10
    $data['total'] = sprintf('%01.2f', $product->Price * $quantity);
    $data['totalweight'] =  $product->Weight * $quantity;
    // and saving it in session
    $session->write('Shop.OrderItem.' . $id, $data);

    $this->cart();

    return $product;
  }

  // this function remove specific product from cart
  public function remove($id) {
    $session = $this->request->session();
      if($session->check('Shop.OrderItem.' . $id)) {
        $product = $session->read('Shop.OrderItem.' . $id);
        $session->delete('Shop.OrderItem.' . $id);
        $this->cart();
        return $product;
      }
      return false;
  }

  // this function count and sum date for order
  public function cart() {
    $session = $this->request->session();
    $shop = $session->read('Shop');
    $quantity = 0;
    $weight = 0;
    $subtotal = 0;
    $total = 0;
    $order_item_count = 0;
    // counting how many items in order and summing another data
    if (count($shop['OrderItem']) > 0) {
      foreach ($shop['OrderItem'] as $item) {
        $quantity += $item['quantity'];
        $weight += $item['totalweight'];
        $total += $item['total'];
        $order_item_count++;
      }
      $d['order_item_count'] = $order_item_count;
      $d['quantity'] = $quantity;
      $d['weight'] = sprintf('%01.2f', $weight);
      $d['total'] = sprintf('%01.2f', $total);
      $session->write('Shop.Order',$d);
      return true;
    }
    else {
      $d['quantity'] = 0;
      $d['weight'] = 0;
      $d['subtotal'] = 0;
      $d['total'] = 0;
      $session->write('Shop.Order', $d + $shop['Order']);
      return false;
    }
  }

  // this function clear all products in cart
  public function clear() {
    $session = $this->request->session();
    $session->delete('Shop');
  }

}
