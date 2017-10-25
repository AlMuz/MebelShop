<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class OrderItem extends Entity
{

    protected $_accessible = [
        '*' => true,
        'idOrder_item' => false
    ];
}
