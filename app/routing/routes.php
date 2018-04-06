<?php

$router = new AltoRouter();

$router->map("GET", "/", "" , "home");

$match = $router->match();


if($match){
    require_once __DIR__."/../controllers/BaseController.php";
    require_once __DIR__."/../controllers/IndexController.php";
    $index = new \App\Controllers\IndexController();
    $index->show();
}else{
     header($_SERVER['SERVER_PROTOCOL']. " 404 Not found");
     echo "Page not found";
}


//var_dump($match);