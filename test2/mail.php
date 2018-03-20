
<?php
    require_once 'vendor/swiftmailer/swiftmailer/lib/swift_required.php';
    try
    {
        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')->setUsername($_ENV['gmailUsername'])->setPassword($_ENV['gmalPassword']);

        $mailer = Swift_Mailer::newInstance($transport);
        $message = Swift_Message::newInstance('test email')
        ->setFrom(array('hostelallotmentism@gmail.com' => 'Our Code World'))
        ->setTo(array("ankurdua15@gmail.com" => "mail@mail.com"))
        ->setBody("<h1>Welcome</h1>", 'text/html');
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
