<?php
namespace Quiz;

use Slim\Slim;

class Route
{
    public static function registration(\Slim\Slim $app)
    {
        $app->add(new \Slim\Extras\Middleware\CsrfGuard());
        
        //top
        $app->get('/', '\Quiz\Controller\Top:show');
        
        //question
        $app->get('/questions', '\Quiz\Controller\Question:show');
        $app->get('/questions/new', '\Quiz\Controller\Question:createShow');
        $app->post('/questions/new', '\Quiz\Controller\Question:createQuestion');
        $app->get('/questions/update', '\Quiz\Controller\Question:updateShow');
        $app->post('/questions/update', '\Quiz\Controller\Question:updateQuestion');
        
        //quiz
        $app->get('/quizzes', '\Quiz\Controller\Quiz:show');
        $app->get('/quizzes/new', '\Quiz\Controller\Quiz:createShow');
        $app->post('/quizzes/new', '\Quiz\Controller\Quiz:createQuiz');
        
        //answer
        $app->post('/answer/start', '\Quiz\Controller\Answer:answerStart');
        $app->post('/answer/end', '\Quiz\Controller\Answer:answerEnd');
        
        //comment
        $app->post('/comment/create', '\Quiz\Controller\Comment:createComment');
        
    }
}