<?php
namespace Quiz;

use Slim\Slim;

class Route
{
    public static function registration(\Slim\Slim $app)
    {
        $app->add(new \Slim\Extras\Middleware\CsrfGuard());
        $app->get('/', '\Quiz\Controller\Top:show');
        $app->get('/questions', '\Quiz\Controller\Question:show');
        $app->get('/questions/new', '\Quiz\Controller\Question:createQuestion');
        $app->post('/questions/new', '\Quiz\Controller\Question:create');
        $app->get('/quizzes', '\Quiz\Controller\Quiz:show');
        $app->get('/quizzes/new', '\Quiz\Controller\Quiz:createQuiz');
        $app->post('/quizzes/new', '\Quiz\Controller\Quiz:create');
        
        //$app->get('/page/:page_num', '\Tinitter\Controller\TimeLine:show');
        //$app->post('/post/commit', '\Tinitter\Controller\Post:commit');
    }
}