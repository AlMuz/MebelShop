<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Userinfo Entity
 *
 * @property int $idUserInfo
 * @property string $Name
 * @property string $Surname
 * @property int $PhoneNumber
 * @property string $City
 * @property string $Adress
 * @property string $IP
 * @property \Cake\I18n\FrozenTime $Date
 */
class Userinfo extends Entity
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
        'idUserInfo' => false
    ];
}
