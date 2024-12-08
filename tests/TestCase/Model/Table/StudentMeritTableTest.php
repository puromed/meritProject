<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentMeritTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentMeritTable Test Case
 */
class StudentMeritTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentMeritTable
     */
    protected $StudentMerit;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.StudentMerit',
        'app.Students',
        'app.Merits',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StudentMerit') ? [] : ['className' => StudentMeritTable::class];
        $this->StudentMerit = $this->getTableLocator()->get('StudentMerit', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->StudentMerit);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StudentMeritTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StudentMeritTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
