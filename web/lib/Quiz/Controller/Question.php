<?php
namespace Quiz\Controller;

use \Quiz\Model\Question as M_Question;
use \Quiz\Validator\Question as V_Question;

class Question
{
    public function show()
    {
        $app = \Slim\Slim::getInstance();
        
        $questions = new M_Question;
        $questionList = $questions->getAllQuestions();
        
        $app->render('Question/show.twig', [
            'question_list' => $questionList
        ]);
    }
    
    public function createShow()
    {
        $app = \Slim\Slim::getInstance();
        
        $app->render('Question/create.twig', [

        ]);
    }

    public function createQuestion()
    {
        $app = \Slim\Slim::getInstance();
        $params = $app->request->params();
        $error_list = V_Question::byArray($params);
        
        if(empty($error_list)){
            $question = new M_Question;
            $questionId = $question->createQuestion(
                $params['title'], 
                $params['content'], 
                $params['choice1'], 
                $params['choice2'], 
                $params['choice3'], 
                $params['choice4'], 
                $params['correct_answer']
            );
        
            $app->redirect('/quiz/questions');
        } else {
            $app->render('Question/create.twig', [
                'params' => $params,
                'error_list' => $error_list
                ]);
        }
        
    }
    
    public function updateShow()
    {
        $app = \Slim\Slim::getInstance();
        $params = $app->request->params();
        
        $question = new M_Question;
        $updateQuestion = $question->find($params['question_id']);
        
        $app->render('Question/update.twig', [
            'update_question' => $updateQuestion
        ]);
    }
    
    public function updateQuestion()
    {
        $app = \Slim\Slim::getInstance();
        $params = $app->request->params();
        $error_list = V_Question::byArray($params);
        
        if(empty($error_list)){
            $question = new M_Question;
            $questionId = $question->updateQuestion(
                $params['id'],
                $params['title'], 
                $params['content'], 
                $params['choice1'], 
                $params['choice2'], 
                $params['choice3'], 
                $params['choice4'], 
                $params['correct_answer']
            );
            
            $app->redirect('/quiz/questions');
        } else {
            $app->render('Question/create.twig', [
                'params' => $params,
                'error_list' => $error_list
            ]);
        }
    }
}