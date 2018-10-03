<?php
require __DIR__ . '/../vendor/autoload.php';

use Acme\Requests\TwitterRequest;
use Acme\Tweet;

$twitterRequest = new TwitterRequest('NateDiaz209', 5);
$respons = $twitterRequest->executeRequest();
foreach ($respons as $tweet) {
    echo $tweet->shoutText();
    echo '<br>';
}