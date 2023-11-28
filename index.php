<?php

use MiladRahimi\PhpRouter\Router;
use Src\Controllers\AuthController;
use Src\Controllers\MainController;
use Src\Controllers\PostController;

require_once 'vendor/autoload.php';


session_start();

ORM::configure('mysql:host=database;dbname=docker');
ORM::configure('username','docker');
ORM::configure('password','docker');

$router = Router::create();

$router->setupView('views');

$router->get('/',[MainController::class, 'indexPage']);


$router->get('/reg',[MainController::class,'regPage']);
$router->post('/register',[AuthController::class,'register']);

$router->get('/log',[MainController::class,'loginPage']);
$router->post('/login',[AuthController::class,'login']);

$router->get('/profile',[MainController::class,'profilePage']);
$router->post('/profile',[PostController::class, 'store']);


$router->dispatch();