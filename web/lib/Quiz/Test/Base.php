<?php
namespace Quiz\Test;

use Quiz\Model\Question as M_Question;
use Quiz\Model\Quiz as M_Quiz;

class Base extends \PHPUnit_Framework_TestCase
{
    use \Uzulla\MockSlimClient;

    static function registrationRoute(\Slim\Slim $app)
    {
        \Tinitter\Route::registration($app);
    }

    static function createSlim()
    {
        return new \Slim\Slim([
            'templates.path' => TEMPLATES_DIR_PATH,
            'view' => new \Slim\Views\Twig()

        ]);
    }

    protected function setUp()
    {
        $schema_sql = file_get_contents(TEST_SCHEMA_SQL);
        \Illuminate\Database\Capsule\Manager::connection()->getPdo()->exec($schema_sql);
        
        $createQuestion0 = new M_Question;
        $createQuestion0->createQuestion(
            'タイトル０', 
            '問題文００', 
            '選択肢０１', 
            '選択肢０２', 
            '選択肢０３', 
            '選択肢０４', 
            4
            );
        
        $createQuestion00 = new M_Question;
        $createQuestion00->createQuestion(
            'タイトル００', 
            '問題文００', 
            '選択肢１０', 
            '選択肢２０', 
            '選択肢３０', 
            '選択肢４０', 
            3
            );
        
        $quiz = new M_Quiz;
        $title = 'クイズタイトルテスト０';
        $quizlist = array(1, 2);
        
        //クイズを作成
        $quizId = $quiz->createQuiz(
            $title,
            $quizlist
            );
    }
}