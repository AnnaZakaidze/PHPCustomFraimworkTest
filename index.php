<?php
require_once __DIR__.'/vendor/autoload.php';
//echo "Hello world";

use app\Controllers\HomeController;
use app\Router;
use app\Request;

$router = new Router(new Request());
$router->get('/','index');
$router->get('/about','about');
$router->get('/contact', [HomeController::class,'contact']);

$router->post('/contact', [HomeController::class,'postContact']);

