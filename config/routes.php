<?php

use App\Controllers\Pages\Home;
use Slim\App;

return function (App $app) {
    $app->get('/', Home::class)->setName('home');
};
