<?php

namespace App\Controllers;

use DI\Container as DIContainer;

abstract class Container{
    protected $container;

    public function __construct(DIContainer $container) {
        $this->container = $container;
    }

    public function __get($key)
    {
        if ($this->container->{$key}){
            return $this->container->{$key};
        }
    }
}