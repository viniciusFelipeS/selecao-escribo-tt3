<?php

namespace App\Controllers\Action\Admin;

use App\Model\Session\Session;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class AdminLogoutAction
{
    public function __invoke(Request $request, Response $response, $args)
    {
        $routeParser = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();
        Session::kill('admin');
        $response =  $response->withHeader('location', $routeParser->urlFor('adminLogin'))->withStatus(303);
        return $response;
    }
}
