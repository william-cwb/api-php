<?php

use src\Controllers\UserController;
use src\Routes\Routes;

require_once 'vendor/autoload.php';

$productController = new UserController();


Routes::get('/customers', function () use ($productController) {
    $productController->index();
});

Routes::post('/customer', function () use ($productController) {
    $productController->store();
});

Routes::get('/customer', function () use ($productController) {
    $productController->show();
});

Routes::put('/customer', function () use ($productController) {
    $productController->update();
});
Routes::run();
