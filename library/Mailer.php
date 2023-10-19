<!-- On veux que chaque nouveau user recoive un email de bienvenue avec son username. 
Il faut configurer phpmailer -->
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendMail
{
    public function __construct()
    {
        $mail = new PHPMailer(true);
        $this->mail = $mail;
        $this->mail->isSMTP();
        $this->mail->setFrom('donotreply@taskflow.ca', 'TaskFlow');
        $this->mail->Host = 'smtp.mailgun.org';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'postmaster@sandbox77b9fd869c3c4fc98c466be441955fdb.mailgun.org';
        $this->mail->Port = 587;
        $this->mail->Password   = 'ce8026ba745d36f3ca7cf229e9e645d0-5465e583-1de6cdbf';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    }

    /**
     * Méthode pour envoyer un email
     */
    public function sendMail($emailAddress, $username, $body, $subject = 'Bienvenue sur TaskFlow')
    {
        try {
            $this->mail->addAddress($emailAddress, $username);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            $this->mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    /**
     * Méthode pour créer le corps du message
     */
    public function craftEmailBody($user)
    {
        //placer dans balise html etc
        $body = "Bonjour " . $user['username'] . " , bienvenue sur TaskFlow";
        return $body;
    }
}
