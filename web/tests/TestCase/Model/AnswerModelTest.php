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

        $answer->answerEnd(
            $answerId,
            1,
            2,
            3,
            4,
            1,
            2,
            3,
            4,
            1,
            2
            );
        
        $answerResult = M_Answer::find($answerId);

        //件数チェック
        $this->assertEquals(1, count($answerResult));

        //内容チェック
        $this->assertEquals(200, $answerResult['answer_status']);
        $this->assertNotNull($answerResult['end_time']);
        $this->assertEquals(1, $answerResult['answer1']);
        $this->assertEquals(2, $answerResult['answer2']);
        $this->assertEquals(3, $answerResult['answer3']);
        $this->assertEquals(4, $answerResult['answer4']);
        $this->assertEquals(1, $answerResult['answer5']);
        $this->assertEquals(2, $answerResult['answer6']);
        $this->assertEquals(3, $answerResult['answer7']);
        $this->assertEquals(4, $answerResult['answer8']);
        $this->assertEquals(1, $answerResult['answer9']);
        $this->assertEquals(2, $answerResult['answer10']);
    }
    
    public function testShowResult()
    {
        //解答情報を作成
        $answer = new M_Answer;
        
        //解答スタート
        $answerId = $answer->answerStart(1, 'land');
        
        //2秒待つ
        sleep(2);
        
        //解答終了
        $answer->answerEnd($answerId, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3);
        
        //結果確認
        $answerResult = $answer->find(1);

        //結果集計
        $answer = new M_Answer;
        $result = $answer->showResult($answerId);

         //結果比較
        $this->assertEquals(10, $result['correctNumber']);
        $this->assertEquals(2, $result['responseTime']);
    }
}
