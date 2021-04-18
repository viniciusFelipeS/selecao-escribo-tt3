<?php

namespace App\Controllers\Action\Car;

use App\Controllers\Container;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class CarFindAction extends Container
{


    public function __invoke(Request $request, Response $response, $args)
    {
        $id = 'id= '.$args['car_id'];
        $data = \App\Model\Entity\Car\Data\CarData::select($id);
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
