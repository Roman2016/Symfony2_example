<?php

namespace SettingBundle\DI;

class CreateJsonMessageService
{
    public function msg($status,$txt)
    {
        $message = array(
            "status" => $status,
            "txt" => $txt
        );
        return json_encode($message);
    }
}