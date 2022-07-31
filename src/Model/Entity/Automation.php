<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use \Cron\CronExpression;
use DateTime;

/**
 * Automation Entity
 *
 * @property int $id
 * @property int $person_id
 * @property string $name
 * @property string $amount
 * @property string $cron
 * @property bool $active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime|null $aplied_on
 *
 * @property \App\Model\Entity\Person $person
 */
class Automation extends Entity
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
        'person_id' => true,
        'name' => true,
        'amount' => true,
        'cron' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'aplied_on' => true,
        'person' => true,
    ];

    /**
     * Determines if it is due to run
     *
     * @return boolean
     */
    protected function _getIsDue(): bool
    {

        return (new CronExpression($this->cron))->isDue();
    }

    /**
     * Calculates the next run date of the expression
     *
     * @return DateTime
     */
    protected function _getNextRunDate(): DateTime
    {
        return (new CronExpression($this->cron))->getNextRunDate();
    }

    /**
     * Calculates the previous run date of the expression
     *
     * @return DateTime
     */
    protected function _getPreviousRunDate(): DateTime
    {
        return (new CronExpression($this->cron))->getPreviousRunDate();
    }


}
