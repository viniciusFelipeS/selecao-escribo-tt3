<?php

namespace App\Controllers\Action\User;

use App\Model\Session\Session;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class UserLogoutAction
{
    public function __invoke(Request $request, Response $response, $args)
    {
        $routeParser = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();
        Session::kill('user');
        $response =  $response->withHeader('location', $routeParser->urlFor('signin'))->withStatus(303);
        return $response;
    }
}
