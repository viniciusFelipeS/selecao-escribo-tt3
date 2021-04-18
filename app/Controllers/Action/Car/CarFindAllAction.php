<?php

namespace App\Controllers\Action\Car;

use App\Controllers\Container;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class CarFindAllAction extends Container
{


    public function __invoke(Request $request, Response $response, $args)
    {
        $data = \App\Model\Entity\Car\Data\CarData::select();
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
