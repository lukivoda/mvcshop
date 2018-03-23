<?php


//C:\wamp64\www\mvcshop
define('BASE_PATH',realpath(__DIR__.'/../../'));

//requiring autoload file so we can ise the dotenv package
require_once (BASE_PATH."/vendor/autoload.php");

$dotEnv = new \Dotenv\Dotenv(BASE_PATH);
//we are initialising  and using load method to prevent overwriting
$dotEnv->load();