<?php
namespace TestCase\Controller;

class TimeLineTest extends \Tinitter\Test\Base
{
    public function testTitle()
    {
        $dom = $this->req_dom('/');
        $this->assertEquals('web eng', $dom->find('title', 0)->text);
        $this->assertEquals('投稿フォーム', $dom->find('h3', 0)->text);
    }
}