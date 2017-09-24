<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CartTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */

    public function addProduct($idProduct) {
  		$allProducts = $this->readProduct();
  		if (null!=$allProducts) {
  			if (array_key_exists($productId, $allProducts)) {
  				$allProducts[$productId]++;
  			} else {
  				$allProducts[$productId] = 1;
  			}
  		} else {
  			$allProducts[$productId] = 1;
  		}

  		$this->saveProduct($allProducts);
  	}

  	/*
  	 * get total count of products
  	 */
  	public function getCount() {
  		$allProducts = $this->readProduct();

  		if (count($allProducts)<1) {
  			return 0;
  		}

  		$count = 0;
  		foreach ($allProducts as $product) {
  			$count=$count+$product;
  		}

  		return $count;
  	}

  	/*
  	 * save data to session
  	 */
  	public function saveProduct($data) {
  		return $session->write('cart',$data);
  	}

  	/*
  	 * read cart data from session
  	 */
  	public function readProduct() {
      // $name = $this->request->session->read('User.name');
      // $session->write('cart',' ');
      // $cart = $session->read('carts');
      $cart = '123';
  		return $cart;
  	}

}
