<?php

namespace App\Controllers\Action\Car;

use App\Model\Entity\Car\Data\CarData;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class CarFindAllOffRentAction
{
    private CarData $car;

    public function __construct(CarData $car)
    {
        $this->car = $car;
    }
    public function __invoke(Request $request, Response $response, $args)
    {
        $offRent = "status = 0";
        $data = $this->car->select($offRent);
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
