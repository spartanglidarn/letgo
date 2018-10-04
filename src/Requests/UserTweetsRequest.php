<?php
namespace Acme\Requests;

use Acme\Tweet;

class UserTweetsRequest extends BaseRequest implements RequestInterface
{
    public $username;
    public $amount;
    public $url;
    public $tweets;

    public function __construct(String $username, int $amount, String $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json')
    {
        parent::__construct();
        $this->username = $username;
        $this->amount = $amount;
        $this->url = $url;
    }

    public function prepareRequest()
    {
        $getfield = '?screen_name=' . $this->username . '&count=' . $this->amount . '&exclude_replies=true&trim_user=true';   
        return ['url' => $this->url, 'getfield' => $getfield];
    }

    public function saveRespons(Array $respons)
    {
        $tweets = [];
        foreach ($respons as $value) {
            $tweets[] = new Tweet($value['id'], $this->username, $value['text']);
        }
        $this->tweets = $tweets;
    }

    public function getRequest(String $url, String $getfield)
    {
        $requestMethod = 'GET';
        $twitter = new \TwitterAPIExchange($this->authKeys);
        $respons = \json_decode($twitter->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest(), true);
        return $respons;
    }
}