<?php

namespace TestCase\Model;

use Quiz\Test\Base;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Quiz\Model\Question as M_Question;
use Common\Common;

class QuestionModelTest extends Base
{

    //問題の作成と参照
    public function testCreateQuestion()
    {
        //問題のモデルを作成して追加１
        $createQuestion1 = new M_Question;
        $id1 = $createQuestion1->createQuestion(
            'タイトル１', 
            '問題文１', 
            '選択肢１', 
            '選択肢２', 
            '選択肢３', 
            '選択肢４', 
            '1'
            );
        
        //問題のモデルを作成して追加２
        $createQuestion2 = new M_Question;
        $id2 = $createQuestion2->createQuestion(
            'タイトル２', 
            '問題文２', 
            '選択肢２１', 
            '選択肢２２', 
            '選択肢２３', 
            '選択肢２４', 
            '2'
            );
        
        //問題の全件参照
        $showQuestion = new M_Question;
        $actual = $showQuestion->getAllQuestions();

        //問題を作成した結果、４（初期２件、追加２件）件であることを確認
        $this->assertEquals(4, count($actual));

         //今回作成した問題の期待結果を作成
         $expected1 = array(
             'title' => 'タイトル１', 
             'content' => '問題文１', 
             'choice1' => '選択肢１', 
             'choice2' => '選択肢２', 
             'choice3' => '選択肢３', 
             'choice4' => '選択肢４', 
             'correct_answer' => 1
         );
             $expected2 = array(
             'title' => 'タイトル２', 
             'content' => '問題文２', 
             'choice1' => '選択肢２１', 
             'choice2' => '選択肢２２', 
             'choice3' => '選択肢２３', 
             'choice4' => '選択肢２４', 
             'correct_answer' => 2
         );

         //今回追加した１番目のレコードを参照
         $actual1 = M_Question::find($id1);

         $this->assertEquals($expected1['title'], $actual1['original']['title']);
         $this->assertEquals($expected1['content'], $actual1['original']['content']);
         $this->assertEquals($expected1['choice1'], $actual1['original']['choice1']);
         $this->assertEquals($expected1['choice2'], $actual1['original']['choice2']);
         $this->assertEquals($expected1['choice3'], $actual1['original']['choice3']);
         $this->assertEquals($expected1['choice4'], $actual1['original']['choice4']);
         $this->assertEquals($expected1['correct_answer'], $actual1['original']['correct_answer']);
         
         //今回追加した２番目のレコードを参照
         $actual2 = M_Question::find($id2);
         
         //問題２の内容確認
         $this->assertEquals($expected2['title'], $actual2['original']['title']);
         $this->assertEquals($expected2['content'], $actual2['original']['content']);
         $this->assertEquals($expected2['choice1'], $actual2['original']['choice1']);
         $this->assertEquals($expected2['choice2'], $actual2['original']['choice2']);
         $this->assertEquals($expected2['choice3'], $actual2['original']['choice3']);
         $this->assertEquals($expected2['choice4'], $actual2['original']['choice4']);
         $this->assertEquals($expected2['correct_answer'], $actual2['original']['correct_answer']);
    }
    
    //問題の１件更新
    public function testUpdateQuestion()
    {
        //id=1のデータを参照
        $question = M_Question::find(1);

        //タイトルの内容を変更
        $question->title = 'タイトル変更後';
        $question->content = '問題文変更後';
        $question->choice1 = '選択肢１変更後';
        $question->choice2 = '選択肢２変更後';
        $question->choice3 = '選択肢３変更後';
        $question->choice4 = '選択肢４変更後';
        $question->correct_answer = 1;
        
        //タイトルを更新
        $question->save();
        
        //再度同じデータを参照
        $actual = M_Question::find(1);

        //タイトルが変更後のデータになっていることを確認
        $this->assertEquals('タイトル変更後', $actual['original']['title']);
        $this->assertEquals('問題文変更後', $actual['original']['content']);
        $this->assertEquals('選択肢１変更後', $actual['original']['choice1']);
        $this->assertEquals('選択肢２変更後', $actual['original']['choice2']);
        $this->assertEquals('選択肢３変更後', $actual['original']['choice3']);
        $this->assertEquals('選択肢４変更後', $actual['original']['choice4']);
        $this->assertEquals(1, $actual['original']['correct_answer']);


    }
}
