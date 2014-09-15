<?php
namespace Quiz\Controller;

use \Quiz\Model\Question as M_Question;

class Question
{
    public function show ()
    {
        echo "question show<br><br>";
        $app = \Slim\Slim::getInstance();
        
        list($question_list) = M_Question::getQuestions();

        $app->render('Question/show.twig', [
            'question_list' => $question_list
        ]);
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