<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('user');
        $this->setDisplayField('idUser');
        $this->setPrimaryKey('idUser');

        // $this->hasMany('Orders', [
        //     'foreignKey' => 'IdUser',
        //     'joinType' => 'INNER'
        // ]);
    }

    public function validationDefault(Validator $validator)
    {
      $validator
          ->integer('idUser')
          ->allowEmpty('idUser', 'create');

      $validator
          ->scalar('Login')
          ->requirePresence('Login', 'create')
          ->notEmpty('Login');

      $validator
          ->scalar('Password')
          ->requirePresence('Password', 'create')
          ->notEmpty('Password');

      $validator
          ->scalar('Email')
          ->requirePresence('Email', 'create')
          ->notEmpty('Email');

      $validator
          ->scalar('Name')
          ->requirePresence('Name', 'create')
          ->notEmpty('Name');

      $validator
          ->scalar('Surname')
          ->requirePresence('Surname', 'create')
          ->notEmpty('Surname');

      $validator
          ->integer('Phonenumber')
          ->requirePresence('Phonenumber', 'create')
          ->notEmpty('Phonenumber');

      $validator
          ->scalar('City')
          ->requirePresence('City', 'create')
          ->notEmpty('City');

      $validator
          ->scalar('Adress')
          ->requirePresence('Adress', 'create')
          ->notEmpty('Adress');

      $validator
          ->integer('Root')
          ->allowEmpty('Root', 'create');

        return $validator;
    }
}
