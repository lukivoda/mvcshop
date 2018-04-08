<?php


use Philo\Blade\Blade;

function view($path, array $data = []) {

    $views = __DIR__."/../../resources/views";
    $cache = __DIR__."/../../bootstrap/cache";

    $blade = new Blade($views,$cache);
    echo $blade->view()->make($path,$data)->render();
}


function make($filename,$data){

//   $data = [
//     'to' =>'test@example.com',
//     'subject' => 'Welcome to mvc store',
//     'view' => 'welcome',
//     'name' => "John Doe",
//     'body' => 'Testing email template'
//
//   ];

    extract($data);//$to = 'test@example.com'  ;$subject = 'Welcome to mvc store';.....


   //not sending anything from this function,but save in an internal buffer
    //turn on output buffering
    ob_start();

    //include template
    include (__DIR__.'/../../resources/views/emails/'.$filename.'.php');

    //get content of the file
    $content =  ob_get_contents();

    //erase the output  and /turn off output buffering
    ob_end_clean();


    return $content;
}