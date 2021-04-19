<?php

namespace App\Controllers\Action\Admin;

use App\Controllers\Controller\Controller;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class AdminAction extends Controller
{
    public function __invoke(Request $request, Response $response, $args)
    {    
        return $this->controller->get('view')->render($response, 'admin.twig', [
            'api' => 'Resources/scripts/api.js',
        ]); 
    }
}
