<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LendingsFixture
 */
class LendingsFixture extends TestFixture
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
                'type' => 'Lorem ipsum do',
                'automatic' => 1,
                'created' => '2022-07-30 23:37:14',
                'modified' => '2022-07-30 23:37:14',
            ],
        ];
        parent::init();
    }
}
