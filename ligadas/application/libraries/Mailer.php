<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require dirname(__FILE__)."/phpmailer/PHPMailer.php";
require dirname(__FILE__)."/phpmailer/Exception.php";
require dirname(__FILE__)."/phpmailer/SMTP.php";

defined('BASEPATH') OR exit('No direct script access allowed');

class Mailer{

    private $host = "smtpout.secureserver.net";
    private $port = 25;
    private $user = "midia@meeplebr.com";
    private $password = "Mid@Meeple.2021";
    private $ssl = true;

    private $mailer;

    public $error;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);

        /* $this->mailer->isSMTP();
        #$this->mailer->Host = $this->host;
        $this->mailer->Port = $this->port;
        $this->mailer->SMTPAuth = false;
        $this->mailer->Username = $this->user;
        $this->mailer->Password = $this->password;
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; */

        $this->mailer->setFrom("naoresponda@rbfstudio.net", "MeepleBR - Não Responda");

        $this->mailer->isHTML(true);
        $this->mailer->CharSet = "UTF-8";
    }

    public function send_email($address, $subject, $body)
    {
        $this->mailer->addAddress($address);
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;

        try{
            $this->mailer->send();
            return true;
        } catch(Exception $e){
            $this->error = $this->mailer->ErrorInfo;
            return false;
        }
    }
}
