<?php

require_once('twitter_proxy.php');
require_once('config.php');

// defaults
$user_id = '14812487';
$screen_name = 'wildfireone';
$count = 5;

if(isset($_GET['count'])){
	$count = $_GET['count'];
}
if(isset($_GET['name'])){
	$screen_name = $_GET['name'];
}

$twitter_url = '1.1/statuses/user_timeline.json';
$twitter_url .= '?screen_name=' . $screen_name;
$twitter_url .= '&count=' . $count;

// Create a Twitter Proxy object from our twitter_proxy.php class
$twitter_proxy = new TwitterProxy(
	$oauth_access_token,			// 'Access token' on https://apps.twitter.com
	$oauth_access_token_secret,		// 'Access token secret' on https://apps.twitter.com
	$consumer_key,					// 'API key' on https://apps.twitter.com
	$consumer_secret				// 'API secret' on https://apps.twitter.com
);

// Invoke the get method to retrieve results via a cURL request
$tweets = $twitter_proxy->get($twitter_url);
echo $tweets;

?>