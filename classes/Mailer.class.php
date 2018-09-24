<?php
require_once "config.php";

class Mailer extends PHPMailer {

  public function sendMail($mail,$destination,$file_name) {

    $email = new PHPMailer();
    $email->SetFrom('you@example.com', 'Your Name'); //Name is optional
    $email->Subject   = 'Message Subject';
    // $email->Body      = $bodytext;
    $email->AddAddress( $mail );

    $file_to_attach = $destination;

    $email->AddAttachment( $file_to_attach , $file_name );

    return $email->Send();
  }
}
