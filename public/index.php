<?php

use app\controllers\authController;
use app\controllers\siteController;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

//echo '<pre>';
//var_dump($_ENV);
//echo '</pre>';
//exit();

$config=[
    'userClass' => app\models\User::class,
    'db'=>[
        'dsn'=>$_ENV['DB_DSN'],
        'user'=>$_ENV['DB_USER'],
        'password'=>$_ENV['DB_PASSWORD']
    ],
];

$app =new Application(dirname(__DIR__), $config);

$app->router->get('/', [siteController::class, 'home']);
$app->router->get('/contact',[siteController::class,'contact']);
$app->router->post('/contact',[siteController::class,'contact']);
$app->router->get('/login',[authController::class,'login']);
$app->router->post('/login',[authController::class,'login']);
$app->router->get('/register',[authController::class,'register']);
$app->router->post('/register',[authController::class,'register']);
//Do this on post method
$app->router->get('/logout',[authController::class,'logout']);
$app->router->get('/profile',[authController::class,'profile']);

$app->run();
