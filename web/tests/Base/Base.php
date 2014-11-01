<?php
namespace Quiz\Model;

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
        
//         $schema_initial_data = file_get_contents(TEST_INITIAL_DATA_SQL);
//         \Illuminate\Database\Capsule\Manager::connection()->getPdo()->exec($schema_initial_data);
    }
}