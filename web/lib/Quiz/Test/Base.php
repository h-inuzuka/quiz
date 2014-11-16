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

        $createQuestion000 = new M_Question;
        $createQuestion000->createQuestion(
            'タイトル０００', 
            '問題文０００', 
            '選択肢１００', 
            '選択肢２００', 
            '選択肢３００', 
            '選択肢４００', 
            3
            );
        
        $createQuestion0000 = new M_Question;
        $createQuestion0000->createQuestion(
            'タイトル００００', 
            '問題文００００', 
            '選択肢１０００', 
            '選択肢２０００', 
            '選択肢３０００', 
            '選択肢４０００', 
            3
            );
        
        $createQuestion00000 = new M_Question;
        $createQuestion00000->createQuestion(
            'タイトル０００００', 
            '問題文０００００', 
            '選択肢１００００', 
            '選択肢２００００', 
            '選択肢３００００', 
            '選択肢４００００', 
            3
            );
        
        $createQuestion000000 = new M_Question;
        $createQuestion000000->createQuestion(
            'タイトル００００００', 
            '問題文００００００００', 
            '選択肢１０００００００', 
            '選択肢２０００００００', 
            '選択肢３０００００００', 
            '選択肢４０００００００', 
            3
            );
        
        $createQuestion0000000 = new M_Question;
        $createQuestion0000000->createQuestion(
            'タイトル０００００００', 
            '問題文０００００００', 
            '選択肢１００００００', 
            '選択肢２００００００', 
            '選択肢３００００００', 
            '選択肢４００００００', 
            3
            );
        
        $createQuestion00000000 = new M_Question;
        $createQuestion00000000->createQuestion(
            'タイトル００００００００', 
            '問題文００００００００', 
            '選択肢１０００００００', 
            '選択肢２０００００００', 
            '選択肢３０００００００', 
            '選択肢４０００００００', 
            3
            );
        
        $createQuestion000000000 = new M_Question;
        $createQuestion000000000->createQuestion(
            'タイトル０００００００００', 
            '問題文０００００００００', 
            '選択肢１００００００００', 
            '選択肢２００００００００', 
            '選択肢３００００００００', 
            '選択肢４００００００００', 
            3
            );
        
        $createQuestion0000000000 = new M_Question;
        $createQuestion0000000000->createQuestion(
            'タイトル００００００００００', 
            '問題文００００００００００', 
            '選択肢１０００００００００', 
            '選択肢２０００００００００', 
            '選択肢３０００００００００', 
            '選択肢４０００００００００', 
            3
            );
        
        $createQuestion999 = new M_Question;
        $createQuestion999->createQuestion(
            'タイトル９９９', 
            '問題文９９９', 
            '選択肢１９９９', 
            '選択肢２９９９', 
            '選択肢３９９９', 
            '選択肢４９９９', 
            3
            );
        
        $quiz = new M_Quiz;
        $title = 'クイズタイトルテスト０';
        $quizlist = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        
        //クイズを作成
        $quizId = $quiz->createQuiz(
            $title,
            $quizlist
            );
    }
}