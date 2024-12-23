<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MeritLetterRequestsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MeritLetterRequestsTable Test Case
 */
class MeritLetterRequestsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MeritLetterRequestsTable
     */
    protected $MeritLetterRequests;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.MeritLetterRequests',
        'app.Students',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MeritLetterRequests') ? [] : ['className' => MeritLetterRequestsTable::class];
        $this->MeritLetterRequests = $this->getTableLocator()->get('MeritLetterRequests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MeritLetterRequests);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MeritLetterRequestsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MeritLetterRequestsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
