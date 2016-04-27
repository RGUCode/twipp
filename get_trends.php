<?php

require_once('twitter_proxy.php');
require_once('config.php');

// defaults to edinburgh (i think)

$woeid = '19344';


if(isset($_GET['id'])){
	$woeid = $_GET['id'];
}

$twitter_url = '1.1/trends/place.json?';
$twitter_url .= '?id=' . $woeid;

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