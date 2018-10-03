<?php
namespace Acme;

class Tweet
{
    public $id;
    public $username;
    public $text;

    public function __construct (int $id, String $username, String $text)
    {
        $this->id = $id;
        $this->username = $username;
        $this->text = $text;
    }


    public function textToUpper ()
    {
        $this->text = strtoupper($this->text);
    }
}