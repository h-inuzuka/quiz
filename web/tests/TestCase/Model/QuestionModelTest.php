<?php

namespace TestCase\Model;

use Quiz\Test\Base;
use Common;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Quiz\Model\Quiz as M_Quiz;
use Quiz\Model\Question as M_Question;

class QuestionModelTest extends Base
{
    //問題の１件保存
    public function testCreateQuestion()
    {
        //問題のモデルを作成して追加
        $question = new M_Question;
        $question->createQuestion(
            'タイトル１', 
            '問題文１', 
            '選択肢１', 
            '選択肢２', 
            '選択肢３', 
            '選択肢４', 
            '正解'
            );
        
        //１件参照
        $actual = M_Question::getQuestions();
        
        //問題を作成した結果、１件であることを確認
        $this->assertEquals(1, count($actual));

//         //問題を作成した結果、内容を確認
//         $this->assertEquals($expected, $actual);
        
    }
    
    //問題全件参照
    public function testShow()
    {

    
    //問題を全件参照する
//         $questions = new M_Question;
//         $actual = $questions->find(1);
//         $actual = M_Question::getQuestions();

        //件数があっていることを確認する
        //$this->assertEquals($expected, $actual);

        //参照した値が正しいことを確認する

    }

    //問題の１件更新
    public function testUpdateQuestion()
    {

    }
}
