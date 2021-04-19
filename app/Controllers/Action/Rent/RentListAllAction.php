<?php

namespace App\Controllers\Action\Rent;

use App\Controllers\Controller\Controller;
use App\Model\Entity\Car\Data\CarData;
use App\Model\Entity\Rent\Data\RentData;
use App\Model\Session\Session;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class RentListAllAction extends Controller
{
    public function __invoke(Request $request, Response $response, $args)
    {
        $user = Session::get('user');
        $data = RentData::select($user->id);
        return $this->controller->get('view')->render($response, 'rent.twig', [
            'rents' => $data,
            'user' =>  Session::get('user') ?? ''
        ]);
    }   
}
