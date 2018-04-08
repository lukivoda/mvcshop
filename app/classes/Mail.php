<?php
/**
 * Created by PhpStorm.
 * User: Stevan
 * Date: 08-Apr-18
 * Time: 08:40
 */

namespace App\Classes;
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

class Mail{

    protected $mail;

    public function __construct(){

        $this->mail = new PHPMailer;
        $this->setUp();
    }

    // setting up the Php mailer for sending emails(sender parameters)
    public function setUp() {

        $this->mail->isSMTP();
        $this->mail->Mailer = 'smtp';
        $this->mail->SMTPAuth =true;
        $this->mail->SMTPSecure = 'tls';

        $this->mail->Host = getenv('SMTP_HOST');
        $this->mail->Port = getenv('SMTP_PORT');

        $environment = getenv('APP_ENV');

        if($environment === 'local') {
            $this->mail->SMTPDebug = 2;
        }

        //auth info
        $this->mail->Username = getenv('EMAIL_USERNAME');
        $this->mail->Password = getenv('EMAIL_PASSWORD');

        //enabling html
        $this->mail->IsHTML(true);

        $this->mail->SingleTo = true;

        //sender info
        $this->mail->From = getenv('ADMIN_EMAIL');
        $this->mail->FromName = getenv('APP_NAME');


     //found this additionally on net(without this  we can't send the email)
        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

    }



    public function send($data){
        //parameters for the recipient
        $this->mail->addAddress($data['to'],$data['name']);
        $this->mail->Subject = $data['subject'];
        //using make functions from helper functions(used for making template
        $this->mail->Body = make($data['view'],array('data' => $data['body']));
//sendinf email
        return $this->mail->send();

    }

}