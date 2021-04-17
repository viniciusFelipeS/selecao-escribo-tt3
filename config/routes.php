<?php

use App\Controllers\Pages\HomePage;


$app->get('/', HomePage::class)->setName('home');
