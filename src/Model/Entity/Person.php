<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property string $name
 *
 * @property \App\Model\Entity\Automation[] $automations
 * @property \App\Model\Entity\Lending[] $lendings
 */
class Person extends Entity
{
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
        'name' => true,
        'automations' => true,
        'lendings' => true,
    ];

    /**
     * Devuelve el balance de la persona.
     * Negativo si nos debe dinero
     * Positivo si le debemos a nosotros
     *
     * @return float
     */
    public function _getBalance(): float
    {
        $balance = 0.00;
        foreach ($this->lendings as $lending) {
            if ($lending->type === Lending::DEBT) {
                $balance -= $lending->amount;
            } else {
                $balance += $lending->amount;
            }
        }

        return $balance;
    }
}
