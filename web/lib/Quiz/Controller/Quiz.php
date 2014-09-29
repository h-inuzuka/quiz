<?php
namespace Quiz\Controller;

use \Quiz\Model\Question as M_Question;
use \Quiz\Model\Quiz as M_Quiz;
use \Quiz\Validator\Quiz as V_Quiz;
use Quiz\Model\Question;


class Quiz
{
    public function show ()
    {
        $app = \Slim\Slim::getInstance();
        
        list($quizList) = M_Quiz::getQuizzes();

//         foreach ($quizList as $quiz){
//             //echo $quiz['id'];
//             $questionQuiz = M_Quiz::find($quiz['id'])->questions;
//             //echo PHP_EOL;
//         }
//         var_dump($questionQuiz);
//         exit;
//        $questionQuiz = M_Quiz::find()->questions;
//         var_dump($questionQuiz);
//         exit;
        
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
        
//         var_dump($params['question']);
//         exit;
        
        if(empty($error_list)){
            $quiz = new M_Quiz;
            $quiz->title = $params['title'];
            $quiz->save();
            
            $quiz_id = 5;
//            $quiz->questions()->attach($quiz_id, array($params['question']));
            $quiz->questions()->sync($params['question']);

//             $quiz = new Quiz(array('title' => 'たいとるー'));

//             $question = new M_Question;
//             $question = Quiz::getTargetCols(Question::find($params['question']), 'original');

//             var_dump($question);
//             exit;
//             $question->quizzes()->insert($quiz);
            
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