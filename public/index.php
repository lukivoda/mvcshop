<?php

//requiring the _env.php so we can use the enviromental variables in the project
require_once (__DIR__."/../bootstrap/init.php");


// we are getting the name of the app from the .enf file in the root of the project
$app_name = getenv('APP_NAME');

//var_dump(in_array("mod_rewrite", apache_get_modules()));

use Illuminate\Database\Capsule\Manager as Capsule;

$category = Capsule::table('categories')->where('id',1)->first();

var_dump($category);