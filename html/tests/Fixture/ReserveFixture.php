<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReserveFixture
 */
class ReserveFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'reserve';
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
                'user_id' => 1,
                'registration_date' => '2022-03-18',
                'created' => '2022-03-18 14:46:40',
                'updated' => '2022-03-18 14:46:40',
                'delflg' => 1,
            ],
        ];
        parent::init();
    }
}
