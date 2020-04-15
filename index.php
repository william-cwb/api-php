<?php

use src\Controllers\UserController;
use src\Routes\Routes;

require_once 'vendor/autoload.php';

$productController = new UserController();


Routes::get('/users', function () use ($productController) {
    $productController->index();
});

Routes::post('/user', function () use ($productController) {
    $productController->store();
});

Routes::get('/user', function () use ($productController) {
    $productController->show();
});

Routes::put('/user', function () use ($productController) {
    $productController->update();
});
Routes::run();
