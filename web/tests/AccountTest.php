<?php

require 'YamlTestCase.php';

class AccountTest extends YamlTestCase
{
    public function testQueryTable()
    {
        $queryTable = $this->getConnection()->createQueryTable('account', 'SELECT * FROM account');
        $expectedTable = $this->getConnection()->createDataSet()->getTable('account');
        $this->assertTablesEqual($expectedTable, $queryTable);
    }

    public function testRowCount()
    {
        $this->assertEquals(1, $this->getConnection()->getRowCount('account'));
        $this->assertEquals(1, $this->getConnection()->getRowCount('bookmark'));
    }
}
