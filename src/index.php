<?php
require __DIR__ . '/../vendor/autoload.php';

use Acme\Requests\UserTweetsRequest;
use Acme\Formatters\UserTweetsFormatter;

$username = $_GET['username'];
$amount = $_GET['amount'];
if (empty($username) || empty($amount)){
    echo "You have to provide a username and amount of tweets to shout";
    die;
}
$twitterRequest = new UserTweetsRequest($username, $amount);
$prepareRequest = $twitterRequest->prepareRequest();
$respons = $twitterRequest->getRequest($prepareRequest['url'], $prepareRequest['getfield']);
$twitterRequest->saveRespons($respons);
$userTweetsFormatter = new UserTweetsFormatter();
$shoutInJson = $userTweetsFormatter->shoutJsonFormat($twitterRequest->tweets);
echo $shoutInJson;