<?php

namespace SettingBundle\DI;

class SendMailService
{
    public function SendMail($title, $email, $body)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($title)
            ->setFrom('sitesymfony7@gmail.com')
            ->setTo($email)
            ->setBody($body);
        return $message;
    }
}