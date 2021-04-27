<?php

namespace App\Controllers\Action\Car;

use App\Controllers\Controller\Controller;
use App\Model\Session\Session;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class CarListAction extends Controller
{
    public function __invoke(Request $request, Response $response, $args)
    {    
        $routeParser = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();
        $data = file_get_contents('http://localhost'.$routeParser->urlFor('rent'));
        $data = json_decode($data);
        return $this->controller->get('view')->render($response, 'car.twig', [
            'api' => 'Resources/scripts/api.js',
            'cars' => $data,
            'user' =>  Session::get('user') ?? ''
        ]);
    }
}
