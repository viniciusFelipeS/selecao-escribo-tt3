<?php

namespace App\Controllers\Action\Car;

use App\Model\Entity\Car\Data\CarData;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class CarCreateAction
{
    private CarData $car;

    public function __construct(CarData $car)
    {
        $this->car = $car;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        $result = $this->car->insert($data);
        $response =  $response->withStatus(201);
        $response->getBody()->write($result);
        return $response;
    }   
}
