<?php

//start session if it is not already started
if(!isset($_SESSION)){
    session_start();
}


//requiring the _env.php so we can use the enviromental variables in the project
require_once (__DIR__."/../app/config/_env.php");


//instantiate database class
new \App\Classes\Database();


//requiring routes file
require_once (__DIR__."/../app/routing/routes.php");

new \App\RouteDispatcher($router);
