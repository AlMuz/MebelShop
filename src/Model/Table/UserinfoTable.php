<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Userinfo Model
 *
 * @method \App\Model\Entity\Userinfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Userinfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Userinfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Userinfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Userinfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Userinfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Userinfo findOrCreate($search, callable $callback = null, $options = [])
 */
class UserinfoTable extends Table
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

        $this->setTable('userinfo');
        $this->setDisplayField('idUserInfo');
        $this->setPrimaryKey('idUserInfo');
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
            ->integer('idUserInfo')
            ->allowEmpty('idUserInfo', 'create');

        $validator
            ->scalar('Name')
            ->requirePresence('Name', 'create')
            ->notEmpty('Name');

        $validator
            ->scalar('Surname')
            ->requirePresence('Surname', 'create')
            ->notEmpty('Surname');

        $validator
            ->integer('PhoneNumber')
            ->requirePresence('PhoneNumber', 'create')
            ->notEmpty('PhoneNumber');

        $validator
            ->scalar('City')
            ->requirePresence('City', 'create')
            ->notEmpty('City');

        $validator
            ->scalar('Adress')
            ->requirePresence('Adress', 'create')
            ->notEmpty('Adress');

        $validator
            ->scalar('IP')
            ->requirePresence('IP', 'create')
            ->notEmpty('IP');

        $validator
            ->dateTime('Date')
            ->requirePresence('Date', 'create')
            ->notEmpty('Date');

        return $validator;
    }
}
