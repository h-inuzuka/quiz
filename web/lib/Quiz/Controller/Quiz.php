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

        $count = 0;
        foreach ($quizList as $quiz){
             array_splice($quizList[$count], 0, 0, Quiz::getTargetCols(M_Quiz::find($quiz['id'])->questions, 'original'));
            $count++;
        }

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
            
            $quiz->questions()->sync($params['question']);
            
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
    
    static public function  getTargetCols($arrayList, $target)
    {
        $arrayTarget = array();
        foreach($arrayList as $arrayLine){ 
            $arrayTarget[] = $arrayLine['original']; 	
        }

        return $arrayTarget;
    }
}