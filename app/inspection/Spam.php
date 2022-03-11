<?php


namespace App\inspection;


class Spam
{
    /**
     * @var string[]
     */
    protected $checker = [
        SpamDetect::class,
        InvalidKeyHeld::class,
    ];

    /**
     * @param $body
     * @return false
     */
    public function detect($body)
    {
        foreach ($this->checker as $check) {
            app($check)->detect($body);
        }
        return false;
    }
}


