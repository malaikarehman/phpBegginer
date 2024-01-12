<?php

function uriIS($uri) {

    return $_SERVER['REQUEST_URI'] === $uri;
}

function routeToController($routes,$uri){

    if(array_key_exists($uri, $routes)){
        require $routes[$uri];
    }
    else{
        abort();
    }
}


function abort(){
  http_response_code(404);
  require 'view/404.php';
  die();
  
}