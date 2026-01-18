<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
use App\controllers\AuthController;
use App\controllers\SiteController;
use App\core\Application;


$config = [
    'userClass' => \App\models\User::class,
    'db' => [
        'dsn' =>$_ENV['DB_DSN'],
        'user' =>$_ENV['DB_USER'],
        'password' =>$_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/',array(SiteController::class, 'home'));

$app->router->get('/contact', array(SiteController::class, 'handelContact'));
$app->router->get('/contact',array(SiteController::class, 'contact'));
$app->router->post('/contact',array(SiteController::class, 'handelContact'));


$app->router->get('/login',array(AuthController::class, 'login'));
$app->router->post('/login',array(AuthController::class, 'login'));

$app->router->post('/register',array(AuthController::class, 'register'));
$app->router->get('/register',array(AuthController::class, 'register'));
$app->router->get('/logout',array(AuthController::class, 'logout'));

$app->run();
