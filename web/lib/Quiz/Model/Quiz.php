<?php
namespace Quiz\Model;

use Common;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Quiz\Model\Question as M_Question;


class Quiz extends Eloquent
{
    
    public function questions()
    {
        return $this->belongsToMany('Quiz\Model\Question');
    }

    public function getQuizzes()
    {
        $quizFindResult = Quiz::all();
        $quizList = Common\Common::getTargetColumn($quizFindResult, 'original');

        return $quizList;
    }
    
    public function getQuiz($quizId)
    {
        $quiz = Quiz::find($quizId);
        $questionList = Common\Common::getTargetColumn($quiz, 'original');
        
        return $questionList;
    }
    
    public function createQuiz(
        $quizTitle,
        $questionIdList
        )
    {
        $quiz = new Quiz();
        $quiz->title = $quizTitle;
        $quiz->save();
        
        $quiz->questions()->sync($questionIdList);
        
        return $quiz->id;
    }

}