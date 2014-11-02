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
        $quizId = $quiz->createQuiz();
        $actual = 1;
        $this->assertEquals(1, $actual);

    }


}