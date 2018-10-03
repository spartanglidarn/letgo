<?php
namespace Acme\Requests;
use Acme\QueryBuilder;

class TwitterRequest implements RequestInterface
{
        private $apiKey;
        private $secretApiKey;
        private $accessToken;
        private $secretAccessToken;

        public $username;
        public $amount;
        public $url;

        public function __construct(String $username, int $amount)
        {
            $this->username = $username;
            $this->amount = $amount;
            $this->url = \getenv('TWITTER_URL');
            $this->apiKey = \getenv('TWITTER_API_KEY');
            $this->secretApiKey = \getenv('TWITTER_SECRET_API_KEY');
            $this->accessToken = \getenv('TWITTER_ACCESS_TOKEN');
            $this->secretAccessToken = \getenv('TWITTER_SECRET_ACCESS_TOKEN');

        }

        public function executeRequest()
        {
            $queryBuilder = new QueryBuilder();
            $queryString = $queryBuilder->twitterQuery($this);
            $settings = [
                'oauth_access_token' => $this->accessToken,
                'oauth_access_token_secret' => $this->secretAccessToken,
                'consumer_key' => $this->apiKey,
                'consumer_secret' => $this->secretApiKey,
            ];
            $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
            $getfield = '?screen_name=' . $this->username . '&count=' . $this->amount . '&exclude_replies=true&trim_user=true';
            $requestMethod = 'GET';

            $twitter = new \TwitterAPIExchange($settings);
            $respons = \json_decode( $twitter->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest());
        }



        private function cacheRequest()
        {

        }
}