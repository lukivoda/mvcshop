<?php

//requiring the _env.php so we can use the enviromental variables in the project
require_once (__DIR__."/../bootstrap/init.php");


// we are getting the name of the app from the .enf file in the root of the project
$app_name = getenv('APP_NAME');

echo $app_name;