<?php

use Slim\Routing\RouteCollectorProxy;

$app->get('/', App\Controllers\Action\Home\HomeAction::class)->setName('home');
$app->get('/carros', App\Controllers\Action\Car\CarListAction::class)->setName('carros');
$app->get('/logout', App\Controllers\Action\User\UserLogoutAction::class)->setName('logout');


$app->group(
    '/login',
    function (RouteCollectorProxy $group) {
        $group->get('/signup', App\Controllers\Action\User\UserSignupAction::class)->setName('signup');
        $group->post('/signup', App\Controllers\Action\User\UserCreateAction::class);
        $group->get('/signin', App\Controllers\Action\User\UserSigninAction::class)->setName('signin');
        $group->post('/signin', App\Controllers\Action\User\UserFindAction::class);
    }
);  

$app->group(
    '/admin',
    function (RouteCollectorProxy $group) {
        $group->get('', App\Controllers\Action\Admin\AdminAction::class)->setName('admin');;
        $group->get('/user', App\Controllers\Action\Admin\AdminAction::class)->setName('adminUser');
    }
);  

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
