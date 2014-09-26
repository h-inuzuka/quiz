<?php
namespace Quiz\Model;

use Common;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Quiz\Model\Quiz as M_Quiz;

class Question extends Eloquent
{

    public function Quizzes()
    {
        return $this->belongsToMany('Quiz\Model\Quiz', 'quiz_question', 'quiz_id', 'question_id');
    }
    
    static function getQuestions()
    {
        $questionFindResult = Question::all();

        $questionList = Common\Common::getTargetOriginal($questionFindResult);

        return [$questionList];
    }


}