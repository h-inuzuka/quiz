<?php
namespace Quiz\Model;

use Common;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Quiz\Model\Quiz as M_Quiz;

class Question extends Eloquent
{
    //relation
    public function quizzes()
    {
        return $this->belongsToMany('Quiz\Model\Quiz');
    }
    
    //問題を１件登録する
    public function createQuestion(
        $title, 
        $content, 
        $choice1, 
        $choice2, 
        $choice3, 
        $choice4, 
        $correctAnswer
        )
    {
        $question = new Question();
        $question->title = $title;
        $question->content = $content;
        $question->choice1 = $choice1;
        $question->choice2 = $choice2;
        $question->choice3 = $choice3;
        $question->choice4 = $choice4;
        $question->correct_answer = $correctAnswer;
        
        $question->save();
        
        return $question->id;
    }

    //問題を全件参照する
    public function getAllQuestions()
    {
        $questionAll = Question::all();

         $questionList = Common\Common::getTargetColumn($questionAll, 'original');

        return $questionList;
    }

    //問題１件を更新する
    public function updateQuestion(
        $id,
        $title, 
        $content, 
        $choice1, 
        $choice2, 
        $choice3, 
        $choice4, 
        $correctAnswer
        )
    {
        $question = Question::find($id);
        $question->title = $title;
        $question->content = $content;
        $question->choice1 = $choice1;
        $question->choice2 = $choice2;
        $question->choice3 = $choice3;
        $question->choice4 = $choice4;
        $question->correct_answer = $correctAnswer;
        
        $question->save();
        
        return $question->id;
    }

}