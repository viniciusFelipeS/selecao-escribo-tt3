<?php

namespace App\Controllers\Pages;

use App\Controllers\Container;

class Home extends Container
{
    public function getHome($request, $response, $ags)
    {
        return $this->container->get('View')->render($response, 'home.twig', [
            'name' => '123131'
        ]);
    }   

}
