<?php

namespace App\Controllers\Action\Home;

use App\Controllers\Controller\Controller;
use App\Model\Session\Session;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class HomeAction extends Controller
{
    public function __invoke(Request $request, Response $response, $ags)
    {
        return $this->controller->get('view')->render($response, 'home.twig', [
            'title' => 'Carro Fácil',
            'user' =>  Session::get('user') ?? '',
        ]);
    }
}
