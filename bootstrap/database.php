<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

// temporarily hardcode this till we get ENV variables in the app !
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '172.18.0.2',
    'database' => 'slimboilerplate',
    'username' => 'db_ltdev',
    'password' => 'password123',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
]);  

$capsule->bootEloquent();