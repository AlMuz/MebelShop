<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Material extends Entity
{
    protected $_accessible = [
        '*' => true,
        'idMaterial' => false
    ];
    
}
