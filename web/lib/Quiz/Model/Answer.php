<?php
namespace Quiz\Model;

use Common;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Quiz\Model\Question as M_Question;
use Quiz\Model\Quiz as M_Quiz;


class Answer extends Eloquent
{
    
    public function quizzes()
    {
        return $this->belongsToMany('Quiz\Model\Quiz');
    }

    public function getAnswers()
    {
        $answerFindResult = Answer::all();
        $answerList = Common\Common::getTargetColumn($answerFindResult, 'original');

        return $answerList;
    }
    
    public function answerStart(
        $quizId,
        $nickname
        )
    {
        $answer = new Answer();
        $answer->quiz_id = $quizId;
        $answer->nickname = $nickname;
        $answer->answer_status = 100;
        $answer->start_time = date("Y/m/d H:i:s", time());
        $answer->save();
                
        return $answer->id;
    }

    public function answerEnd(
        $answerId
        )
    {
        $answer = Answer::find($answerId);
        
        $answer->end_time = date("Y/m/d H:i:s", time());
        $answer->answer_status = 200;
        
        $answer->save();

    }
}