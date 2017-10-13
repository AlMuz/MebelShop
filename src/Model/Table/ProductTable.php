<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ProductTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('product');
        $this->setDisplayField('idProduct');
        $this->setPrimaryKey('idProduct');

        $this->belongsTo('Category',[
          'foreignKey' => 'Category_idCategory',
          'joinType' => 'INNER'
        ]);

        $this->belongsTo('Material',[
          'foreignKey' => 'Material_idMaterial',
          'joinType' => 'INNER'
        ]);

        $this->hasMany('Image',[
          'foreignKey' => 'Product_idProduct'
        ]);

        $this->hasMany('order_item',[
          'foreignKey' => 'Product_idProduct',
          'joinType' => 'INNER'
        ]);

    }

    public function validationDefault(Validator $validator)
    {
      $validator
          ->integer('idProduct')
          ->allowEmpty('idProduct', 'create');

      $validator
          ->scalar('Name')
          ->requirePresence('Name', 'create')
          ->notEmpty('Name');

      $validator
          ->decimal('Price')
          ->requirePresence('Price', 'create')
          ->notEmpty('Price');

      $validator
          ->scalar('Description')
          ->requirePresence('Description', 'create')
          ->notEmpty('Description');

      $validator
          ->integer('Interest')
          ->requirePresence('Interest', 'create')
          ->notEmpty('Interest');

      $validator
          ->scalar('Size')
          ->requirePresence('Size', 'create')
          ->notEmpty('Size');

      $validator
          ->decimal('Weight')
          ->requirePresence('Weight', 'create')
          ->notEmpty('Weight');

      $validator
          ->integer('Category_idCategory')
          ->requirePresence('Category_idCategory', 'create')
          ->notEmpty('Category_idCategory');

      $validator
          ->integer('Material_idMaterial')
          ->requirePresence('Material_idMaterial', 'create')
          ->notEmpty('Material_idMaterial');

        return $validator;
    }

    // Saving file in the right directory
  	public function savefile($data){
  		$uploadDir = WWW_ROOT . 'img/product/';
  		if(!file_exists($uploadDir)) {
      	mkdir($uploadDir);
  		}

  		$dirfordb= 'product/';
  		$tmpname = $data['MainImage']['tmp_name'];
  		$filename = $this->renamefile($data);
  		move_uploaded_file($tmpname, $uploadDir.$filename);
  		$newname =  $dirfordb.$filename;
  		return $newname;
  	}

  	//Renaming file with the right name
  	public function renamefile($data){
  		$randomstr = $this->randomstring($data);
  		$ext = $this->extchecker($data);
  		$filename = $randomstr.'.'.$ext;
  		return $filename;
  	}
  	//Generating random string for renamefile function. Using previous file name and crypting it in md5
  	public function randomstring($data){
  		$file_path = $data['MainImage']['name'];
  		$md5name = md5($file_path);
  		$randomstr = substr($md5name,0,8);
  		return $randomstr;
    }
  	//Getting extension
  	public function extchecker($data){
  		$file_path = $data['MainImage']['name'] ;
  		$path_parts = pathinfo($file_path);
  		$ext = $path_parts['extension'];
  		return $ext;
  	}
}
