<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReserveTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReserveTable Test Case
 */
class ReserveTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReserveTable
     */
    protected $Reserve;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Reserve',
        'app.Users',
        'app.Schedules',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Reserve') ? [] : ['className' => ReserveTable::class];
        $this->Reserve = $this->getTableLocator()->get('Reserve', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Reserve);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ReserveTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ReserveTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
