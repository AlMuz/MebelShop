<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class OrderItemTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);
        // setting table from db to this model
        $this->setTable('order_item');
        $this->setDisplayField('idOrder_item');
        $this->setPrimaryKey('idOrder_item');
        // setting realations between this table and:
        $this->belongsTo('Orders',[
          'foreignKey' => 'Orders_idOrder',
          'joinType' => 'INNER'
        ]);
        $this->belongsTo('Product',[
          'foreignKey' => 'Product_idProduct',
          'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
      // validation for inputs
        $validator
            ->integer('idOrder_item')
            ->allowEmpty('idOrder_item', 'create');

        $validator
            ->integer('orders_idOrder')
            ->requirePresence('orders_idOrder', 'create')
            ->notEmpty('orders_idOrder');

        $validator
            ->scalar('Product_idProduct')
            ->requirePresence('Product_idProduct', 'create')
            ->notEmpty('Product_idProduct');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->decimal('sub_total')
            ->requirePresence('sub_total', 'create')
            ->notEmpty('sub_total');

        return $validator;
    }
}
