<?php
namespace Acme\Requests;

class BaseRequest
{
        protected $authKeys;

        public function __construct()
        {
            $this->authKeys = [
                'oauth_access_token' => \getenv('TWITTER_ACCESS_TOKEN'),
                'oauth_access_token_secret' => \getenv('TWITTER_SECRET_ACCESS_TOKEN'),
                'consumer_key' => \getenv('TWITTER_API_KEY'),
                'consumer_secret' => \getenv('TWITTER_SECRET_API_KEY'),
            ];
        }
}