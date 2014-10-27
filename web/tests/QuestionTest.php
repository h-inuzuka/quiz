<?php

require 'YamlTestCase.php';

class QuestionTest extends YamlTestCase
{
    public function testQueryTable()
    {
        $queryTable = $this->getConnection()->createQueryTable('questions', 'SELECT * FROM questions');
        $expectedTable = $this->getConnection()->createDataSet()->getTable('questions');
        $this->assertTablesEqual($expectedTable, $queryTable);
    }

    public function testRowCount()
    {
        $this->assertEquals(12, $this->getConnection()->getRowCount('questions'));
        $this->assertEquals(2, $this->getConnection()->getRowCount('quizzes'));
        $this->assertEquals(20, $this->getConnection()->getRowCount('question_quiz'));
        $this->assertEquals(3, $this->getConnection()->getRowCount('answers'));
        $this->assertEquals(4, $this->getConnection()->getRowCount('comments'));
    }
}
