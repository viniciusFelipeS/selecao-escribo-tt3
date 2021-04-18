<?php

namespace App\Controllers\Action\Car;

use App\Controllers\Container;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class CarDeleteAction extends Container
{


    public function __invoke(Request $request, Response $response, $args)
    {
        $carId = $args['car_id'];
        $id = 'id= '.$carId;
        $data = \App\Model\Entity\Car\Data\CarData::delete($id);
        $response->getBody()->write($carId);
        return $response->withHeader('Content-Type', 'application/json');
    }
}
