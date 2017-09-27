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

        $this->setTable('category');
        $this->setDisplayField('idCategory');
        $this->setPrimaryKey('idCategory');

        $this->hasMany('Product')
         ->setForeignKey('Category_idCategory');
    }

    public function validationDefault(Validator $validator)
    {
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
