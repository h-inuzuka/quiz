<?php
namespace TestCase\Quiz\Model;

use Quiz\Test\Base;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Quiz\Model\Question as M_Question;
use Common\Common;
use Quiz\Model\Quiz as M_Quiz;

class QuizModelTest extends Base
{
    //クイズの作成と参照
    public function testCreateQuiz()
    {
        $quiz = new M_Quiz;
        
        $title = 'クイズタイトルテスト';
        $quizlist = array(1, 2);
        
        //クイズを作成
        $quizId = $quiz->createQuiz(
            $title,
            $quizlist
            );
        //クイズ全件参照
        $showQuiz = new M_Quiz();
        $actualAll = $showQuiz->getQuizzes();

        //クイズ件数チェック
        $this->assertEquals(2, count($actualAll));
        
        //クイズ参照
        $actual = M_Quiz::find($quizId);
        
        //期待結果作成
        $expectedQuizTitle = 'クイズタイトルテスト';
        $quizModel = new M_Quiz;
        $actualQuizRelation = $actual->questions;
        
        $this->assertEquals($expectedQuizTitle, $actual['original']['title']);
        
        $this->assertEquals('タイトル０', $actualQuizRelation[0]['title']);
        $this->assertEquals('タイトル００', $actualQuizRelation[1]['title']);
        
        $this->assertEquals('問題文００', $actualQuizRelation[0]['content']);
        $this->assertEquals('問題文００', $actualQuizRelation[1]['content']);
        
        $this->assertEquals('選択肢０１', $actualQuizRelation[0]['choice1']);
        $this->assertEquals('選択肢１０', $actualQuizRelation[1]['choice1']);
        
        $this->assertEquals('選択肢０２', $actualQuizRelation[0]['choice2']);
        $this->assertEquals('選択肢２０', $actualQuizRelation[1]['choice2']);
        
        $this->assertEquals('選択肢０３', $actualQuizRelation[0]['choice3']);
        $this->assertEquals('選択肢３０', $actualQuizRelation[1]['choice3']);
        
        $this->assertEquals('選択肢０４', $actualQuizRelation[0]['choice4']);
        $this->assertEquals('選択肢４０', $actualQuizRelation[1]['choice4']);
        
        $this->assertEquals(4, $actualQuizRelation[0]['correct_answer']);
        $this->assertEquals(3, $actualQuizRelation[1]['correct_answer']);
    }

    public function testGetQuiz()
    {
        //1番目のクイズデータと関連するクイズを取得
        $quiz = new M_Quiz;
        $questionList = M_Quiz::find(1);
        
//         var_dump($questionList);
//         exit;
        
        
        //実データ確認
        $actualQuiz = M_Quiz::find(1);
        $actualQuestion = M_Question::find(1);
        
        //件数
        $actual = M_Quiz::find(1)->questions;
        $this->assertEquals(2, count($actual));
        
        //クイズ情報
        $this->assertEquals('クイズタイトルテスト０', $actualQuiz['title']);
        
        //問題情報
        $this->assertEquals('タイトル０', $actualQuestion['title']);
        $this->assertEquals('問題文００', $actualQuestion['content']);
       
    }

}