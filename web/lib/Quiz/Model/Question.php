<?php
namespace Quiz\Model;

use Common;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Question extends Eloquent
{

    public function quiz() {
        return $this->BelongsTo('Quiz\Model\Quiz');
    }
    
    static function getQuestions()
    {
        $questionFindResult = static::orderBy('id', 'ASC')->get()->all();
        $questionList = Common\Common::getTargetOriginal($questionFindResult);

        return [$questionList];
    }


}