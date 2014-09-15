<?php
namespace Quiz\Controller;

class Top
{
    public function show ()
    {
        //echo "top show";
        $app = \Slim\Slim::getInstance();
        $app->render('Top/show.twig', []);
    }
}