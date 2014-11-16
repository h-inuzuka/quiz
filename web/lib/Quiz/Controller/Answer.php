<?php
namespace Quiz\Controller;

use \Quiz\Model\Question as M_Question;
use \Quiz\Model\Quiz as M_Quiz;
use \Quiz\Model\Answer as M_Answer;
use \Quiz\Validator\Answer as V_Answer;
use Common\Common;


class Answer
{
    public function answerStart ()
    {
        $app = \Slim\Slim::getInstance();
        
        $params = $app->request->params();
        
        $quizzes = new M_Quiz;
        
        $questionList = $quizzes->find($params['quiz_id'])->questions;
        
        $answer = new M_Answer;
        $nickname = 'land';
        $answerId = $answer->answerStart($params['quiz_id'], $nickname);
        
        $app->render('Answer/answer_start.twig', [
            'question_list' => $questionList,
            'answer_id' => $answerId
        ]);
    }
    
    public function answerEnd()
    {
        $app = \Slim\Slim::getInstance();
        
        $params = $app->request->params();
        
        $answer = new M_Answer;
        $answerId = $answer->answerEnd(
            $params['answer_id'],
            $params['answer1'],
            $params['answer2'],
            $params['answer3'],
            $params['answer4'],
            $params['answer5'],
            $params['answer6'],
            $params['answer7'],
            $params['answer8'],
            $params['answer9'],
            $params['answer10']
            );
        
        $result = $answer->showResult($answerId);
        
        $app->render('Answer/answer_end.twig', [
            'result' => $result
        ]);
    }
}