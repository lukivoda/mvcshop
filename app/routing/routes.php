<?php

$router = new AltoRouter();

$router->map("GET", "/about", "" , "about us");

$match = $router->match();


if($match){
    echo "about us page";
}else{
     header($_SERVER['SERVER_PROTOCOL']. " 404 Not found");
     echo "Page not found";
}


//var_dump($match);