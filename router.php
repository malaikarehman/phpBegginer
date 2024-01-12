<?php
require_once 'function.php';

$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

$routes =  [
    '/' =>'controllers/index.php',
    '/analytics'=> 'controllers/analytics.php',
    '/integration' =>'controllers/integration.php',
    '/security'=> 'controllers/security.php'
];


routeToController($routes, $uri);

