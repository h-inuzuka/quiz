<?php
namespace Quiz\Model;

use Common;
use Illuminate\Database\Eloquent\Model as Eloquent;


class Quiz extends Eloquent
{
    public function questions()
    {
        return $this->hasMany('Quiz\Model\Question');
    }
    
    static function getQuizzes()
    {
        $quizFindResult = static::orderBy('id', 'ASC')->get()->all();
        $quizList = Common\Common::getTargetOriginal($quizFindResult);

        return [$quizList];
    }
    

}