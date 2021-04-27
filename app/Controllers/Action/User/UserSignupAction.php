<?php

namespace App\Controllers\Action\User;

use App\Controllers\Controller\Controller;
use App\Model\Session\Session;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class UserSignupAction extends Controller
{
    public function __invoke(Request $request, Response $response, $args)
    {    
        $routeParser = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();
        if (Session::isLogged('user')){
            $response = $response->withHeader('location', $routeParser->urlFor('home'))->withStatus(303);
            return $response;
        }
        return $this->controller->get('view')->render($response, 'login.twig', [
            'title'  => 'Cadastrar',
            'title1' => 'Preencha seus dados',
            'login'  => $routeParser->urlFor('signin'),
            'action' => 'Entrar',
            'api'    => '../Resources/scripts/signup.js',
        ]); 
    }
}
