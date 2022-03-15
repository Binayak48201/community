<?php


namespace App\inspection;

use Exception;


class SpamDetect
{
    /**
     * @var string[]
     */
    protected $invalidKeyboards = [
        'jpt',
        'stink'
    ];

    /**
     * @param $message
     * @throws Exception
     */
    public function detect($message)
    {
        foreach ($this->invalidKeyboards as $keywords) {
            if (stripos($message, $keywords) !== false) {
                throw new Exception('Your message contains spam.');
            }
        }
    }
}
