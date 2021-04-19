<?php

namespace App\Controllers\Action\Admin;

use App\Controllers\Controller\Controller;
use App\Model\Session\Session;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class AdminLoginAction extends Controller
{
    public function __invoke(Request $request, Response $response, $args)
    {    
        $routeParser = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();
        if (Session::isLogged('admin')){
            $response = $response->withHeader('location', $routeParser->urlFor('admin'))->withStatus(303);
            return $response;
        }
        return $this->controller->get('view')->render($response, 'login.twig', [
            'title'  => 'Entrar',
            'title1' => 'Admin',
            'admin' =>'-admin',
            'api'    => '../Resources/scripts/signin.js',
        ]); 
    }
}
