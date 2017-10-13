<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ImageTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('image');
        $this->setDisplayField('idImage');
        $this->setPrimaryKey('idImage');

        $this->belongsTo('Product',[
          'foreignKey' => 'Product_idProduct'
        ]);
    }

    public function savefile($data){
  		$uploadDir = WWW_ROOT . 'img/product/';
  		if(!file_exists($uploadDir)) {
      	mkdir($uploadDir);
  		}

  		$dirfordb= 'product/';
  		$tmpname = $data['Image']['tmp_name'];
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
  		$file_path = $data['Image']['name'];
  		$md5name = md5($file_path);
  		$randomstr = substr($md5name,0,8);
  		return $randomstr;
    }
  	//Getting extension
  	public function extchecker($data){
  		$file_path = $data['Image']['name'] ;
  		$path_parts = pathinfo($file_path);
  		$ext = $path_parts['extension'];
  		return $ext;
  	}
}
