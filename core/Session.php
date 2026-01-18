<?php

namespace App\core;

class Session
{
    protected  const FLASH_KEY = 'flash_message';

    public function __construct()
    {
        session_start();
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        // i make referance because we take just copie of the session not the origin session
        foreach ($flashMessages as $key => &$flashMessage){
            // mark to be removed
            $flashMessage['removed'] = true;
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    public function setFlash($key, $message)
    {
        $_SESSION[self::FLASH_KEY][$key] = [
            'removed' => false,
            'value' => $message
        ];
    }

    public function getMessage($key)
    {
        return $_SESSION[self::FLASH_KEY][$key]['value'] ??  false;


    }

    public function __destruct()
    {
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        // i make referance because we take just copie of the session not the origin session
        foreach ($flashMessages as $key => &$flashMessage){
            // mark to be removed
            if($flashMessage['removed']){
                unset($flashMessages[$key]);
            }
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

}