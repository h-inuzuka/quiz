<?php
namespace Quiz\Controller;

use \Quiz\Model\Question as M_Question;
use \Quiz\Model\Quiz as M_Quiz;
use \Quiz\Validator\Quiz as V_Quiz;


class Quiz
{
    public function show ()
    {
        //$quizList = new M_Quiz;
        //$quizList->questions();
        //$quizList = M_Quiz::getQuizzes();

        
        $app = \Slim\Slim::getInstance();
        
        list($quizList) = M_Quiz::getQuizzes();

        
        
        $app->render('Quiz/show.twig', [
            'quiz_list' => $quizList
        ]);
    }
    
    public function createQuiz()
    {
        $app = \Slim\Slim::getInstance();
        list($question_list) = M_Question::getQuestions();
        $app->render('Quiz/create.twig', [
            'question_list' => $question_list
        ]);
    }

    public function create ()
    {
        $app = \Slim\Slim::getInstance();
        $params = $app->request->params();
        $error_list = V_Quiz::byArray($params);

        
        if(empty($error_list)){
            $quiz = new M_Quiz;
            $quiz->title = $params['title'];
            $quiz->save();
        
            $app->redirect('/quiz/quizzes');
        } else {
            list($question_list) = M_Question::getQuestions();
            $app->render('Quiz/create.twig', [
                'params' => $params,
                'error_list' => $error_list,
                'question_list' => $question_list
                ]);
        }
        
    }
    
    public function  getTargetCols($arrayList, $target)
    {
        $arrayTarget = array();
        foreach($arrayList as $arrayLine){ 
            $arrayTarget[] = $arrayLine['original']; 	
        }

        return $arrayTarget;
    }
}