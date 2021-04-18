<?php

namespace App\Controllers\Action;

use App\Controllers\Container;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class HomeAction extends Container
{
    public function __invoke(Request $request, Response $response, $ags)
    {
        return $this->container->get('view')->render($response, 'home.twig', [
            'title' => '222123131',
            'name' => ['tes' => 1222232131232131321],
        ]);
    }
}
