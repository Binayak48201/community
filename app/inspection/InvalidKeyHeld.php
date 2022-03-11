<?php


namespace App\inspection;

use Exception;

class InvalidKeyHeld
{
    /**
     * @param $message
     * @throws Exception
     */
    public function detect($message)
    {
        if (preg_match('/(.)\\1{4,}/', $message)) {
            throw new Exception('Your message contains spam.');
        }
    }
}
