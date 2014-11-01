<?php
namespace Quiz\Model;

use Common;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Quiz\Model\Quiz as M_Quiz;

class Question extends Eloquent
{
    public function quizzes()
    {
        return $this->belongsToMany('Quiz\Model\Quiz');
    }
    
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
    }

    
    static function getQuestions()
    {
        $questionAll = Question::all();

         $questionList = Common\Common::getTargetOriginal($questionAll, 'original');
        return [$questionList];
    }


}