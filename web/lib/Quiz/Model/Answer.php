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
        $answerId,
        $answer1,
        $answer2,
        $answer3,
        $answer4,
        $answer5,
        $answer6,
        $answer7,
        $answer8,
        $answer9,
        $answer10
        )
    {
        $answer = Answer::find($answerId);
        if($answer->end_time != null){
            return $answerId;
        }
        
        $answer->end_time = date("Y/m/d H:i:s", time());
        $answer->answer_status = 200;
        $answer->answer1 = $answer1;
        $answer->answer2 = $answer2;
        $answer->answer3 = $answer3;
        $answer->answer4 = $answer4;
        $answer->answer5 = $answer5;
        $answer->answer6 = $answer6;
        $answer->answer7 = $answer7;
        $answer->answer8 = $answer8;
        $answer->answer9 = $answer9;
        $answer->answer10 = $answer10;
        
        $answer->save();
        
        return $answerId;
    }
    
    //answerIdの正解数、解答時間を計算
    public function showResult($answerId)
    {
        //該当するanswerIdの解答結果を取得
        $answer = new Answer();
        $answerResult = $answer->find($answerId);

        //各問題の正解を取得
        $quiz = new M_Quiz;
        
        $quiz = $quiz->find($answerResult['quiz_id']);

        $questions = M_Quiz::find($quiz['id'])->questions;

        //解答結果と正解を比較
        $correctNumber = 0;
        if($answerResult['answer1'] === $questions[0]['correct_answer']){
            $correctNumber++;
        } 
        if($answerResult['answer2'] === $questions[1]['correct_answer']){
            $correctNumber++;
        } 
        if($answerResult['answer3'] === $questions[2]['correct_answer']){
            $correctNumber++;
        } 
        if($answerResult['answer4'] === $questions[3]['correct_answer']){
            $correctNumber++;
        } 
        if($answerResult['answer5'] === $questions[4]['correct_answer']){
            $correctNumber++;
        } 
        if($answerResult['answer6'] === $questions[5]['correct_answer']){
            $correctNumber++;
        } 
        if($answerResult['answer7'] === $questions[6]['correct_answer']){
            $correctNumber++;
        } 
        if($answerResult['answer8'] === $questions[7]['correct_answer']){
            $correctNumber++;
        } 
        if($answerResult['answer9'] === $questions[8]['correct_answer']){
            $correctNumber++;
        } 
        if($answerResult['answer10'] === $questions[9]['correct_answer']){
            $correctNumber++;
        } 
        
        //解答時間を計算
        $responseTime = strtotime($answerResult['end_time']) - strtotime($answerResult['start_time']);

        //正解数と解答時間を返却
        return array('nickname' => $answerResult['nickname'], 'correctNumber' => $correctNumber, 'responseTime' => $responseTime);
    }
}