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
            $question->title = $params['title'];
            $question->content = $params['content'];
            $question->choice1 = $params['choice1'];
            $question->choice2 = $params['choice2'];
            $question->choice3 = $params['choice3'];
            $question->choice4 = $params['choice4'];
            $question->correct_answer = $params['correct_answer'];
            $question->save();
        
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
            $question->title = $params['title'];
            $question->content = $params['content'];
            $question->choice1 = $params['choice1'];
            $question->choice2 = $params['choice2'];
            $question->choice3 = $params['choice3'];
            $question->choice4 = $params['choice4'];
            $question->correct_answer = $params['correct_answer'];
            $question->save();
        
            $app->redirect('/quiz/questions');
        } else {
            $app->render('Question/create.twig', [
                'params' => $params,
                'error_list' => $error_list
                ]);
        }
        
    }
}