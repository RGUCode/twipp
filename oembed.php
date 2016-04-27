<?php

require_once('twitter_proxy.php');
require_once('config.php');

// defaults
$id = 719870230982500400;

if(isset($_GET['id'])){
	$id = $_GET['id'];
}

$twitter_url = '1/statuses/oembed.json';
$twitter_url .= '?url=https://twitter.com/Interior/status/' . $id;

// Create a Twitter Proxy object from our twitter_proxy.php class
$twitter_proxy = new TwitterProxy(
	$oauth_access_token,			// 'Access token' on https://apps.twitter.com
	$oauth_access_token_secret,		// 'Access token secret' on https://apps.twitter.com
	$consumer_key,					// 'API key' on https://apps.twitter.com
	$consumer_secret				// 'API secret' on https://apps.twitter.com
);

// Invoke the get method to retrieve results via a cURL request
$tweet = $twitter_proxy->get($twitter_url);
echo $tweet;

?>