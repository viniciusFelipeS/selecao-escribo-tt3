<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Controllers\Pages\Home;
use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;

$container = new Container();
AppFactory::setContainer($container);

$container->set('View', function () {
   $view = Twig::create('templates', ['cache' => false]);
   return $view;

});
$container->set('Home', fn ($container) => new Home($container));


$app = AppFactory::create();
$app->setBasePath('/estribo');
$app->addErrorMiddleware(true, true, true);


$app->get('/', 'Home:getHome')->setName('home');

$app->run();
