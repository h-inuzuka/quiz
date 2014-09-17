<?php
namespace Quiz\Model;

use Common;

class Quiz extends \Illuminate\Database\Eloquent\Model
{
    static function getQuizzes()
    {
        $quizFindResult = static::orderBy('id', 'ASC')->get()->all();
        $quizList = Common\Common::getTargetOriginal($quizFindResult);

        return [$quizList];
    }
    

}