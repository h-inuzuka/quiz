<?php
define('TEMPLATES_DIR_PATH', __DIR__.'/templates');
// define('DEBUG', true);
//define('LOG_LEVEL', \Slim\Log::FATAL);

$db_settings = [
    'driver' => 'sqlite',
//     'database' => __DIR__.'/../sqlite.db'
    'database' => ':memory:'
];
/*
$db_settings = [
'driver' => 'mysql',
'host' => '127.0.0.1',
'post' => '3306',
'database' => 'quiz',
'username' => 'quiz',
'password' => 'quiz',
'charset' => 'utf8',
'collation' => 'utf8_unicode_ci'
];
*/