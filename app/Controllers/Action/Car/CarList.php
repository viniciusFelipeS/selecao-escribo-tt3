<?php

namespace App\Controllers\Action\Car;

use App\Controllers\Container;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class CarList extends Container
{
    public function __invoke(Request $request, Response $response, $args)
    {   
        return $this->container->get('view')->render($response, 'car.twig', []);
    }
}
