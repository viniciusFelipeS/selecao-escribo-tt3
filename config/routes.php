<?php

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Routing\RouteCollectorProxy;

$app->get('/', App\Controllers\Action\HomeAction::class)->setName('home');
$app->get('/carro', App\Controllers\Action\Car\CarList::class)->setName('carro');

$app->group(
    '/api',
    function (RouteCollectorProxy $group) {
        $group->get('', App\Controllers\Action\Car\CarFindAllAction::class);
        $group->post('', App\Controllers\Action\Car\CarCreateAction::class);
        $group->get('/{car_id}', App\Controllers\Action\Car\CarFindAction::class);
        $group->put('/{car_id}', App\Controllers\Action\Car\CarUpdateAction::class);
        $group->delete('/{car_id}', App\Controllers\Action\Car\CarDeleteAction::class);
    }
);
