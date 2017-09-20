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

        $this->hasMany('Image',[
          'foreignKey' => 'Product_idProduct',
          'joinType' => 'INNER'
        ]);

        $this->belongsToMany('Carts');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
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
            ->integer('Price')
            ->requirePresence('Price', 'create')
            ->notEmpty('Price');

        $validator
            ->scalar('Description')
            ->requirePresence('Description', 'create')
            ->notEmpty('Description');

        $validator
            ->scalar('MainImage')
            ->allowEmpty('MainImage');

        $validator
            ->integer('Category_idCategory')
            ->requirePresence('Category_idCategory', 'create')
            ->notEmpty('Category_idCategory');

        return $validator;
    }
}
