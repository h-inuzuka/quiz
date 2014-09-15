<?php

session_start();

//ライブラリの読み込み
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../config.php';

ini_set('display_errors', '1');

//データベース接続セットアップ
\Base\DB::registerIlluminate($db_settings);


//Slimの初期化
$app = new \Slim\Slim([
    'templates.path' => TEMPLATES_DIR_PATH,
    'view' => new \Slim\Views\Twig()
    //'debug' => DEBUG,
    //'log.level' => \Slim\Log::WARN
]);

//Slimにルートを登録
\Quiz\Route::registration($app);


//実行
$app->run();
