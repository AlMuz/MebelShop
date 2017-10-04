<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class MaterialTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('material');
        $this->setDisplayField('idMaterial');
        $this->setPrimaryKey('idMaterial');

        $this->hasMany('Product')
         ->setForeignKey('Material_idMaterial');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('idMaterial')
            ->allowEmpty('idMaterial', 'create');

        $validator
            ->scalar('Title')
            ->requirePresence('Title', 'create')
            ->notEmpty('Title');

        return $validator;
    }
}
