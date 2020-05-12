<?php
require_once __DIR__.'/Router.php';
require_once __DIR__.'/Request.php';
require_once __DIR__.'/Controllers/HomeController.php';
//echo "Hello world";

use app\Controllers\HomeController;

$router = new Router(new Request());
$router->get('/','index');
$router->get('/about','about');
$router->get('/contact', [HomeController::class,'contact']);

$router->post('/contact', [HomeController::class,'postContact']);

