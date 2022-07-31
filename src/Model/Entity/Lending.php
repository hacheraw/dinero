<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lending Entity
 *
 * @property int $id
 * @property int $person_id
 * @property string $name
 * @property string $amount
 * @property string $type
 * @property bool $automatic
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Person $person
 */
class Lending extends Entity
{
    public const DEBT = 'debt';
    public const PAYMENT = 'payment';

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'person_id' => true,
        'name' => true,
        'amount' => true,
        'type' => true,
        'automatic' => true,
        'created' => true,
        'modified' => true,
        'person' => true,
    ];
}
