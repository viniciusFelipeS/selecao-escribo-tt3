<?php

use Slim\Routing\RouteCollectorProxy;

$app->get('/', App\Controllers\Action\Home\HomeAction::class)->setName('home');
$app->get('/carros', App\Controllers\Action\Car\CarListAction::class)->setName('carros');
$app->get('/admin', App\Controllers\Action\Admin\AdminAction::class)->setName('admin');

$app->group(
    '/api',
    function (RouteCollectorProxy $group) {
        $group->get('', App\Controllers\Action\Car\CarFindAllAction::class)->setName('api');
        $group->post('', App\Controllers\Action\Car\CarCreateAction::class);
        $group->get('/{car_id}', App\Controllers\Action\Car\CarFindAction::class);
        $group->patch('/{car_id}', App\Controllers\Action\Car\CarUpdateAction::class);
        $group->delete('/{car_id}', App\Controllers\Action\Car\CarDeleteAction::class);
    }
);  
