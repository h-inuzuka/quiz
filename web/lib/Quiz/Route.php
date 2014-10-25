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


    }
}