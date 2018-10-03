<?php
namespace Acme;
use Acme\Requests\TwitterRequest;

class QueryBuilder
{
    public function twitterQuery(TwitterRequest $twitterRequest)
    {
        $queryString = 'screen_name=' . $twitterRequest->username . '?count=' . $twitterRequest->amount;
        return $queryString;
    }
}