<?php

use Src\Controllers\CatalogueController;
use Src\Controllers\HomeController;
use Src\Controllers\ProductController;

$router = new \Bramus\Router\Router();

$router->mount('/admin', function () use ($router) {
    $router->get('/', HomeController::class . '@index');

    $router->mount('/catalogue', function () use ($router) {
        $router->get('/', CatalogueController::class . '@index');
        $router->get('/create', CatalogueController::class . '@create');
        $router->post('/store', CatalogueController::class . '@store');
        $router->get('/edit/{id}', CatalogueController::class . '@edit');
        $router->post('/update/{id}', CatalogueController::class . '@update');
        $router->post('/delete/{id}', CatalogueController::class . '@delete');
    });

    $router->mount('/product', function () use ($router) {
        $router->get('/', ProductController::class . '@index');
        $router->get('/create', ProductController::class . '@create');
        $router->post('/store', ProductController::class . '@store');
        $router->get('/show/{id}', ProductController::class . '@show');
        $router->get('/edit/{id}', ProductController::class . '@edit');
        $router->post('/update/{id}', ProductController::class . '@update');
        $router->post('/delete/{id}', ProductController::class . '@delete');

        $router->get('/search', ProductController::class . '@search');
        $router->get('/searchByCatalogue/{catalogue_id}', ProductController::class . '@searchByCatalogue');
    });
});

$router->run();