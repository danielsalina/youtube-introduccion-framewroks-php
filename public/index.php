<?php

// php -S localhost:8008 -t public/
// Es nuestro front controller, por aquí pasan todas las solicitudes

require __DIR__ . '/../vendor/autoload.php';

$request = new App\Http\Request;
$request->send();