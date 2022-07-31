<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AutomationsFixture
 */
class AutomationsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'person_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'amount' => 1.5,
                'cron' => 'Lorem ipsum dolor sit amet',
                'active' => 1,
                'created' => '2022-07-30 23:37:48',
                'modified' => '2022-07-30 23:37:48',
                'aplied_on' => '2022-07-30 23:37:48',
            ],
        ];
        parent::init();
    }
}
