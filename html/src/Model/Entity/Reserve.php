<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reserve Entity
 *
 * @property int $id
 * @property int $user_id
 * @property \Cake\I18n\FrozenDate $registration_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 * @property int $delflg
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Schedule[] $schedules
 */
class Reserve extends Entity
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
        'user_id' => true,
        'registration_date' => true,
        'created' => true,
        'updated' => true,
        'delflg' => true,
        'user' => true,
        'schedules' => true,
    ];
}
