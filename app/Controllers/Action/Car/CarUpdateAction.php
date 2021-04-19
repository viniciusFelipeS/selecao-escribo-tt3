<?php

namespace App\Controllers\Action\Car;

use App\Model\Entity\Car\Data\CarData;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class CarUpdateAction
{
    private CarData $car;

    public function __construct(CarData $car)
    {
        $this->car = $car;
    }
    public function __invoke(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        $carId = $args['car_id'];
        $result = $this->car->update($data, $carId);
        $response->getBody()->write($carId);
        return $response;
    }
}
