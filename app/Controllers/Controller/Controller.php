<?php

namespace App\Controllers\Controller;

use DI\Container as DIContainer;

abstract class Controller{
    protected $controller;

    public function __construct(DIContainer $controller) {
        $this->controller = $controller;
    }

    public function __get($key)
    {
        if ($this->controller->{$key}){
            return $this->controller->{$key};
        }
    }
}