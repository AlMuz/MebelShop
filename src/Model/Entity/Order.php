<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $idOrder
 * @property int $User_IdUser
 * @property int $Status
 * @property float $Weight
 * @property int $Order_item_count
 * @property int $Shipping
 * @property float $Total
 * @property int $Order_Type
 * @property \Cake\I18n\FrozenTime $Created
 */
class Order extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'idOrder' => false
    ];
}
