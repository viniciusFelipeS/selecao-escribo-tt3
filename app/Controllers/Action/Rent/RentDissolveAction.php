<?php

namespace App\Controllers\Action\Rent;

use App\Model\Entity\Rent\Data\RentData;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class RentDissolveAction
{
    private RentData $rent;

    public function __construct(RentData $rent)
    {
        $this->rent = $rent;
    }
    public function __invoke(Request $request, Response $response, $args)
    {
        $routeParser = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();
        $data = $request->getParsedBody();
        $this->rent->update($data);
        $response = $response->withHeader('location', $routeParser->urlFor('pedidos'))->withStatus(200);
        return $response;
    }
}
