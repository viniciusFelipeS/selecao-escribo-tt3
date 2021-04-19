<?php

namespace App\Controllers\Action\Rent;

use App\Model\Entity\Rent\Service\RentCreate;
use App\Model\Session\Session;
use Selective\Validation\Exception\ValidationException;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class RentCreateAction
{
    private RentCreate $rent;

    public function __construct(RentCreate $rent)
    {
        $this->rent = $rent;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $routeParser = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();
        $user = Session::get('user');
        $data = $request->getParsedBody()['id'];
        try {
            $this->rent->create($data, $user);
        } catch (ValidationException $e) {
            $response =  $response->withHeader('location', $routeParser->urlFor($e->getMessage()))->withStatus($e->getCode());
            return $response;
        }

        $response =  $response->withHeader('location', $routeParser->urlFor('home'));
        return $response;
    }
}
