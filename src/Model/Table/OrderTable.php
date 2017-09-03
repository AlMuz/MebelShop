<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Order Model
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderTable extends Table
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

        $this->setTable('order');
        $this->setDisplayField('idOrder');
        $this->setPrimaryKey('idOrder');
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
            ->integer('idOrder')
            ->allowEmpty('idOrder', 'create');

        $validator
            ->scalar('Name')
            ->requirePresence('Name', 'create')
            ->notEmpty('Name');

        $validator
            ->scalar('Surname')
            ->requirePresence('Surname', 'create')
            ->notEmpty('Surname');

        $validator
            ->scalar('City')
            ->requirePresence('City', 'create')
            ->notEmpty('City');

        $validator
            ->scalar('Adress')
            ->requirePresence('Adress', 'create')
            ->notEmpty('Adress');

        $validator
            ->integer('PhoneNumber')
            ->requirePresence('PhoneNumber', 'create')
            ->notEmpty('PhoneNumber');

        $validator
            ->integer('Cart_idCart')
            ->requirePresence('Cart_idCart', 'create')
            ->notEmpty('Cart_idCart');

        return $validator;
    }
}
