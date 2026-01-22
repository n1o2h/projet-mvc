<?php
require __DIR__. '/vendor/autoload.php';

use App\controllers\AuthController;
use App\controllers\SiteController;
use App\core\Application;
use App\models\User;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$config = [

    'userClass' => User::class,
    'db' => [
        'dsn' =>$_ENV['DB_DSN'],
        'user' =>$_ENV['DB_USER'],
        'password' =>$_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(__DIR__, $config);

$app->db->applyMigration();
