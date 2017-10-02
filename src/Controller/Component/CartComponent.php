<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class CartComponent  extends Component{

  public $controller;

  public $maxQuantity = 99;

  public function initialize(array $config)
      {
        $this->Product = TableRegistry::get('Product');
      }

  public function add($id, $quantity = 1) {
      $session = $this->request->session();

      if(!is_numeric($quantity)) {
          $quantity = 1;
      }

      $quantity = abs($quantity);


      if($quantity > $this->maxQuantity) {
          $quantity = $this->maxQuantity;
      }


      if($quantity == 0) {
          $this->remove($id);
          return;
      }


      $product = $this->Product->get($id);

      if(empty($product)) {
          return false;
      }



      if($session->check('Shop.OrderItem.' . $id )) {
          $productmod['Productmod']['id'] = $session->read('Shop.OrderItem.' . $id . '.Product.productmod_id');
          $productmod['Productmod']['name'] = $session->read('Shop.OrderItem.' . $id . '.Product.productmod_name');
          $productmod['Productmod']['price'] = $session->read('Shop.OrderItem.' . $id . '.Product.price');

      }


      // if(isset($productmod)) {
      //     $product['Product']['productmod_id'] = $productmod['Productmod']['id'];
      //     $product['Product']['productmod_name'] = $productmod['Productmod']['name'];
      //     $product['Product']['price'] = $productmod['Productmod']['price'];
      //     $productmodId = $productmod['Productmod']['id'];
      //     $data['productmod_id'] = $product['Product']['productmod_id'];
      //     $data['productmod_name'] = $product['Product']['productmod_name'];
      // } else {
      //     $product['Product']['productmod_id'] = '';
      //     $product['Product']['productmod_name'] = '';
      //     $productmodId = 0;
      //     $data['productmod_id'] = '';
      //     $data['productmod_name'] = '';
      // }
      // debug($product);
      // die();
      $data['product_id'] = $product->idProduct;
      $data['name'] = $product->Name;
      $data['price'] = $product->Price;
      $data['quantity'] = $quantity;
      $data['total'] = sprintf('%01.2f', $product->Price * $quantity);
      // debug($data);
      // die();
      $session->write('Shop.OrderItem.' . $id, $data);
      // $session->write('Shop.Order.shop', +1);

      $this->cart();

      return $product;
  }

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

  public function cart() {
    $session = $this->request->session();
    $shop = $session->read('Shop');
    $quantity = 0;
    $weight = 0;
    $subtotal = 0;
    $total = 0;
    $order_item_count = 0;

    if (count($shop['OrderItem']) > 0) {
        foreach ($shop['OrderItem'] as $item) {
            $quantity += $item['quantity'];

            $total += $item['total'];
            $order_item_count++;
        }
        $d['order_item_count'] = $order_item_count;
        $d['quantity'] = $quantity;
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

  public function clear() {
      $session = $this->request->session();
      $session->delete('Shop');
  }

}
