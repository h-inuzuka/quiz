<?php
session_start();

require '../vendor/autoload.php';
require '../config.php';

$db_settings = array(
    'driver' => 'sqlite',
    'database' => ":memory:",
);

define("TEST_SCHEMA_SQL", __DIR__."/../schema.sqlite3.sql");

\Base\DB::registerIlluminate($db_settings);

