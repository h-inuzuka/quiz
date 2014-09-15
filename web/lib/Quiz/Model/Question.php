<?php
namespace Quiz\Model;

use Common;

class Question extends \Illuminate\Database\Eloquent\Model
{
    static function getQuestions()
    {
        $questionFindResult = static::orderBy('id', 'ASC')->get()->all();
        $questionList = Common\Common::getTargetOriginal($questionFindResult);
var_dump($questionList);
        return [$questionList];
    }
    

}