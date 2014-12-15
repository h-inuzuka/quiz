<?php
namespace Quiz\Controller;

use \Quiz\Model\Question as M_Question;
use \Quiz\Model\Quiz as M_Quiz;
use \Quiz\Validator\Quiz as V_Quiz;
use Quiz\Model\Question;
use Common\Common;


class Quiz
{
    public function show ()
    {
        $app = \Slim\Slim::getInstance();
        
        $quizzes = new M_Quiz;
        
        $quizList = $quizzes->getQuizzes();

//         var_dump($quizList);
//         exit;
        
        $count = 0;
        foreach ($quizList as $quiz){
             array_splice($quizList[$count], 0, 0, Common::getTargetColumn(M_Quiz::find($quiz['id'])->questions, 'original'));
            $count++;
        }

        $app->render('Quiz/show.twig', [
            'quiz_list' => $quizList
        ]);
    }
    
    public function createShow()
    {
        $app = \Slim\Slim::getInstance();
        $question = new M_Question;
        $questionList = $question->getAllQuestions();

        $app->render('Quiz/create.twig', [
            'question_list' => $questionList
        ]);
    }

    public function createQuiz ()
    {
        $app = \Slim\Slim::getInstance();
        $params = $app->request->params();
        $error_list = V_Quiz::byArray($params);
        
        if(empty($error_list)){
            $quiz = new M_Quiz;
            $quizId = $quiz->createQuiz($params['title'], $params['question']);
            
            $app->redirect('/quiz/quizzes');
        } else {
// var_dump($params['question']);
// exit;
            $app->render('Quiz/create.twig', [
                'params' => $params['question'],
                'error_list' => $error_list
                ]);
        }
        
    }
}