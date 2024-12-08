<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentMeritsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentMeritsTable Test Case
 */
class StudentMeritsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentMeritsTable
     */
    protected $StudentMerits;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.StudentMerits',
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
        $config = $this->getTableLocator()->exists('StudentMerits') ? [] : ['className' => StudentMeritsTable::class];
        $this->StudentMerits = $this->getTableLocator()->get('StudentMerits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->StudentMerits);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StudentMeritsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StudentMeritsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
