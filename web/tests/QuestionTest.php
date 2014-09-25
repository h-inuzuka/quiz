<?php

require 'YamlTestCase.php';

class QuestionTest extends YamlTestCase
{
    public function testQueryTable()
    {
        $queryTable = $this->getConnection()->createQueryTable('question', 'SELECT * FROM question');
        $expectedTable = $this->getConnection()->createDataSet()->getTable('question');
        $this->assertTablesEqual($expectedTable, $queryTable);
    }

    public function testRowCount()
    {
        $this->assertEquals(12, $this->getConnection()->getRowCount('question'));
        $this->assertEquals(2, $this->getConnection()->getRowCount('quiz'));
        $this->assertEquals(20, $this->getConnection()->getRowCount('quiz_question'));
        $this->assertEquals(3, $this->getConnection()->getRowCount('answer'));
        $this->assertEquals(4, $this->getConnection()->getRowCount('comment'));
    }
}
