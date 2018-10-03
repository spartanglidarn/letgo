<?php
require __DIR__ . '/../vendor/autoload.php';

use Acme\Requests\TwitterRequest;

$twitterRequest = new TwitterRequest('NateDiaz209', 5);
$respons = $twitterRequest->executeRequest();