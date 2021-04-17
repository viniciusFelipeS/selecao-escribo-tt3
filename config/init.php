<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;

require_once __DIR__ . "/../vendor/autoload.php";

$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();


$container->set('View', function () {
    $view = Twig::create(__DIR__.'/../templates', ['cache' => false]);
    return $view;
 });


(require_once __DIR__."/routes.php")($app);


$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true,true,true);


$app->setBasePath('/estribo');


return $app;