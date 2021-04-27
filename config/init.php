<?php

use App\Model\Session\Session;
use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require_once __DIR__ . "/../vendor/autoload.php";

use App\Model\Common\Environment;
Environment::load(__DIR__.'/../');


$container = new Container();
AppFactory::setContainer($container);

$container->set('view', function () {
    $view = Twig::create(__DIR__ . '/../Templates/Views/Templates', ['cache' => false]);
    return $view;
});

$app = AppFactory::create();
$app->add(TwigMiddleware::createFromContainer($app));
$app->setBasePath('/'.getenv('URL_PATH'));

require_once __DIR__ . "/routes.php";

$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(false, true, true);

return $app;
