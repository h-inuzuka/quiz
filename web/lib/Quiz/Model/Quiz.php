<?php
namespace Quiz\Model;

use Common;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Quiz\Model\Question as M_Question;


class Quiz extends Eloquent
{
    
    public function Questions()
    {
        return $this->belongsToMany('Quiz\Model\Question', 'quiz_question', 'quiz_id', 'question_id');
    }

    static function getQuizzes()
    {
        $quizFindResult = Quiz::all();
        $quizList = Common\Common::getTargetOriginal($quizFindResult);

        return [$quizList];
    }
    

}