<?php
namespace Acme\Formatters;
use Acme\Tweet;

class UserTweetsFormatter
{
    public function shoutJsonFormat(Array $tweets)
    {
        $data = [];
        foreach ($tweets as $value) {
            $data[] = ['shout' => $value->shoutText()];
        }
        $returnData['data'] = $data;
        return \json_encode($returnData);
    }
}