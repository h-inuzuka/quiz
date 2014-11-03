<?php
namespace TestCase\Model;

use Quiz\Test\Base;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Quiz\Model\Question as M_Question;
use Quiz\Model\Quiz as M_Quiz;
use Common\Common;
use Quiz\Model\Answer as M_Answer;

class AnswerModelTest extends Base
{
    //回答
    public function testAnswerStart()
    {
        //指定したクイズのパラメータを作成
        $quizId = 1;
        $nickname = 'trick';
        
        //回答する
        $answer = new M_Answer;
        $answerId1 = $answer->answerStart(3, 'trick');
        $answerId2 = $answer->answerStart(2, 'land');
        
        //全件参照
        $ans = new M_Answer;
        $result = $ans->getAnswers();
        
        //件数チェック
        $this->assertEquals(2, count($result));
// var_dump($result);
// exit;
        //参照した値が正しいことを確認する
        $this->assertEquals(3, $result[0]['quiz_id']);
        $this->assertEquals('trick', $result[0]['nickname']);
        $this->assertEquals(100, $result[0]['answer_status']);
        $this->assertNotNull($result[0]['start_time']);
        $this->assertNull($result[0]['end_time']);

        $this->assertEquals(2, $result[1]['quiz_id']);
        $this->assertEquals('land', $result[1]['nickname']);
        $this->assertEquals(100, $result[1]['answer_status']);
        $this->assertNotNull($result[1]['start_time']);
        $this->assertNull($result[1]['end_time']);
    }

    //回答完了
    public function testAnswerEnd()
    {
        $answer = new M_Answer;
        $answerId = $answer->answerStart(3, 'trick');

        $answer->answerEnd($answerId);
        
        $answerResult = M_Answer::find($answerId);
        
        //件数チェック
        $this->assertEquals(1, count($answerResult));
        
        //内容チェック
        $this->assertEquals(200, $answerResult['answer_status']);
        $this->assertNotNull($answerResult['end_time']);
    }
}
