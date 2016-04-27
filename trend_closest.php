<?php

require_once('twitter_proxy.php');
require_once('config.php');

// defaults to aberdeen

$lat = '57.1497';
$long = '-2.0981';

if(isset($_GET['lat'])){
	$lat = $_GET['lat'];
}
if(isset($_GET['lng'])){
	$long = $_GET['lng'];
}

$twitter_url = '1.1/trends/closest.json';
$twitter_url .= '?lat=' . $lat ."&long=" . $long;

// Create a Twitter Proxy object from our twitter_proxy.php class
$twitter_proxy = new TwitterProxy(
	$oauth_access_token,			// 'Access token' on https://apps.twitter.com
	$oauth_access_token_secret,		// 'Access token secret' on https://apps.twitter.com
	$consumer_key,					// 'API key' on https://apps.twitter.com
	$consumer_secret				// 'API secret' on https://apps.twitter.com	// The number of tweets to pull out
);

// Invoke the get method to retrieve results via a cURL request
$tweets = $twitter_proxy->get($twitter_url);

echo $tweets;

?>