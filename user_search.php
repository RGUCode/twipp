<?php

require_once('twitter_proxy.php');
require_once('config.php');

// defaults
$count=5;
$q='default';

if(isset($_GET['count'])){
	$count = $_GET['count'];
}
if(isset($_GET['name'])){
	$q = $_GET['name'];
}

$twitter_url = 'users/search.json';
$twitter_url .= '?q=' . $q;
$twitter_url .= '&count=' . $count;
echo $twitter_url;

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