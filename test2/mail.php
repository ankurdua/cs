
<?php
    require 'vendor/autoload.php';
    try
    {
        $transport = new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl');
        $transport->setUsername($_ENV['gmailUsername']);
        $transport->setPassword($_ENV['gmailPassword']);

        $mailer = new Swift_Mailer($transport);
        $message = new Swift_Message('test email');
        $message->setFrom(array('hostelallotmentism@gmail.com' => 'Our Code World'));
        $message->setTo(array("ankurdua15@gmail.com" => "mail@mail.com"));
        $message->setBody("<h1>Welcome</h1>", 'text/html');
        $result = $mailer->send($message);
        if($result)
        {
            echo "mail sent";
        }
        else
        {
            echo "not sent";
        }
    }
 catch (Exception $e)
 {
     echo $e;
 }
