<?php

use App\Providers\FlashServiceProvider;
use App\Providers\ViewServiceProvider;

$container->addServiceProvider(new ViewServiceProvider());
$container->addServiceProvider(new FlashServiceProvider());