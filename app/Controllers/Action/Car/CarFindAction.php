<?php

namespace App\Controllers\Action\Car;

use App\Model\Entity\Car\Data\CarData;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class CarFindAction
{
    private CarData $car;

    public function __construct(CarData $car)
    {
        $this->car = $car;
    }
    public function __invoke(Request $request, Response $response, $args)
    {
        $id = 'id= '.$args['car_id'];
        $data = $this->car->select($id);

        $codeStatus = $this->checkFill($data);
        
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json')->withStatus($codeStatus);
    }

    private function checkFill($data){
        return count($data) ? 200 : 202;
    }
}
