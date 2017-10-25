<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CategoryTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);
        // setting table from db to this model
        $this->setTable('category');
        $this->setDisplayField('idCategory');
        $this->setPrimaryKey('idCategory');
        // setting realations between this table and:
        $this->hasMany('Product')
         ->setForeignKey('Category_idCategory');
    }

    public function validationDefault(Validator $validator)
    {
        // validation for inputs
        $validator
            ->integer('idCategory')
            ->allowEmpty('idCategory', 'create');

        $validator
            ->scalar('Title')
            ->requirePresence('Title', 'create')
            ->notEmpty('Title');

        $validator
            ->scalar('Description')
            ->requirePresence('Description', 'create')
            ->notEmpty('Description');

        return $validator;
    }
}
