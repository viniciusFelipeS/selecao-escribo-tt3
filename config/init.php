<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require_once __DIR__ . "/../vendor/autoload.php";

$container = new Container();
AppFactory::setContainer($container);
$container->set('view', function () {
    $view = Twig::create(__DIR__ . '/../templates', ['cache' => false]);
    return $view;
});


$app = AppFactory::create();
$app->add(TwigMiddleware::createFromContainer($app));
$app->setBasePath('/estribo');


require_once __DIR__ . "/routes.php";


$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);




return $app;
