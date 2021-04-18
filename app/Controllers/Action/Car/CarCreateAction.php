<?php

namespace App\Controllers\Action\Car;

use App\Controllers\Container;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class CarCreateAction extends Container
{
    
    public function __invoke(Request $request, Response $response, $args)
    {
        $data = \App\Model\Entity\Car\Data\CarData::insert($request->getParsedBody());
        $response =  $response->withHeader('Content-Type','application/json')->withStatus(201);
        $response->getBody()->write((string)json_encode($data));
        return $response;
    }   
}
