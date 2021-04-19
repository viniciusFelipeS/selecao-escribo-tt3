<?php

namespace App\Controllers\Action\Car;

use App\Controllers\Controller\Controller;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class CarListAction extends Controller
{
    public function __invoke(Request $request, Response $response, $args)
    {    
        $data = file_get_contents('http://localhost/estribo/api');
        $data = json_decode($data);
        return $this->controller->get('view')->render($response, 'car.twig', [
            'api' => 'Resources/scripts/api.js',
            'cars' => $data,
        ]);
    }
}
