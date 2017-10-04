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
          'foreignKey' => 'Product_idProduct',
          'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
      $validator
            ->integer('idImage')
            ->allowEmpty('idImage', 'create');

        $validator
            ->scalar('Image')
            ->requirePresence('Image', 'create')
            ->notEmpty('Image');

        $validator
            ->integer('Product_idProduct')
            ->requirePresence('Product_idProduct', 'create')
            ->notEmpty('Product_idProduct');

        return $validator;
    }
}
