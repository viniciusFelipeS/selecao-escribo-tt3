<?php

namespace App\Controllers\Pages;

use App\Controllers\Container;

final class HomePage extends Container
{
    public function __invoke($request, $response, $ags)
    {
        return $this->container->get('view')->render($response, 'home.twig', [
            'title' => '222123131',
            'name' => ['tes' => 1222232131232131321],
        ]);
    }
}
