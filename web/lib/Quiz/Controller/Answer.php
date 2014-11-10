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
        $nickname = 'ニックネーム';
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
        
//         var_dump($params);
//         exit;
        $answer = new M_Answer;
        $result = $answer->answerEnd($params['answer_id']);
        
        
//         var_dump($result);
//         exit;
        
        $app->render('Answer/answer_end.twig', [
            
        ]);
    }
}