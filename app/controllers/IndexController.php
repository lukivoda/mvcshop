<?php
/**
 * Created by PhpStorm.
 * User: Stevan
 * Date: 06-Apr-18
 * Time: 18:41
 */

namespace App\Controllers;


use App\Classes\Mail;

class IndexController extends BaseController
{

    public function show(){

        echo "Inside homepage from controller class";
        $mail = new Mail();
        //parameters for the recipient
        $data = [
            'to' =>'s.zmajsek@gmail.com',
            'subject' => 'Welcome to mvc store',
            'view' => 'welcome',
            'name' => "John Doe",
            'body' => 'Testing email template'

        ];
        //we are using send method from the Mail class
        if($mail->send($data)){
            echo "email sent successfully";
        }else{
            echo 'email is not sent';
        }
    }

}