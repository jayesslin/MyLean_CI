<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/23
 * Time: 22:57
 */


class SenMail
{
    private $fromMailName='';
    private $formMailPassword='';
    private $mail='';
//密码是授权码
    function __construct($fromMailName = '493965578qq.com', $fromMailPassword = '12345923jayess')
    {
        require_once('class.phpmailer.php');
        require_once('class.smtp.php');
        $this->fromMailName=$fromMailName;
        $this->formMailPassword=$fromMailPassword;
        $this->mail = new PHPMailer();
    }
    /**
     * @param string $arrayMail array集合
     * @param $senName 发件人
     * @param $title 标题
     * @param $body 内容
     */
    function sendMail($arrayMail,$senName, $title, $body)
    {
        //invoke mail() function to send mail
        // mail($toaddress, $subject, $mailcontent, $fromaddress);
        date_default_timezone_set('Asia/Shanghai');//设定时区东八区
        $fromMailPassword=$this->formMailPassword;
        $fromMailName=$this->fromMailName;
        $mail = $this->mail;
        $mail->SMTPDebug = 0;                               // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.qq.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $email = explode("@", $fromMailName);
        $mail->Username = $email[0];                 // SMTP username
        $mail->Password = $fromMailPassword;                            // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;
        $mail->CharSet = 'utf-8';
//        echo $mail->Host;                                  // TCP port to connect to
        $mail->setFrom($this->fromMailName, $senName);
        // $mail->addAddress('714080794@qq.com', 'Joe User');     // Add a recipient
        foreach($arrayMail as $v) {
            $mail->addAddress($v);               // Name is optional
        }
//         $mail->addReplyTo('714034323@qq.com', 'Information');
//         $mail->addCC('714034323@qq.com');
//         $mail->addBCC('714034323@qq.com');
//         $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//         $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(false);                                  // Set email format to HTML
        $mail->Subject = $title;
        $mail->Body = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo ucwords('Message has been sent');
        }
    }
}