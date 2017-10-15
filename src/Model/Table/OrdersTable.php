<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class OrdersTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');

        $this->setTable('orders');
        $this->setDisplayField('idOrder');
        $this->setPrimaryKey('idOrder');

        $this->belongsTo('User',[
          'foreignKey' => 'User_IdUser',
          'joinType' => 'INNER'
        ]);

        $this->hasMany('OrderItem', [
            'foreignKey' => 'orders_idOrder',
            'joinType' => 'INNER'
        ]);

    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('idOrder')
            ->allowEmpty('idOrder', 'create');

        $validator
            ->integer('User_IdUser')
            ->requirePresence('User_IdUser', 'create')
            ->notEmpty('User_IdUser');

        $validator
            ->integer('Status')
            ->requirePresence('Status', 'create')
            ->notEmpty('Status');

        $validator
            ->decimal('Weight')
            ->requirePresence('Weight', 'create')
            ->notEmpty('Weight');

        $validator
            ->integer('Order_item_count')
            ->requirePresence('Order_item_count', 'create')
            ->notEmpty('Order_item_count');

        $validator
            ->integer('Shipping')
            ->requirePresence('Shipping', 'create')
            ->notEmpty('Shipping');

        $validator
            ->decimal('Total')
            ->requirePresence('Total', 'create')
            ->notEmpty('Total');

        $validator
            ->integer('Order_Type')
            ->requirePresence('Order_Type', 'create')
            ->notEmpty('Order_Type');

        return $validator;
    }
}
