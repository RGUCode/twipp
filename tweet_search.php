<?php

require_once('twitter_proxy.php');
require_once('config.php');

// defaults

$q = 'default';
$count = 5;
if(isset($_GET['count'])){
	$count = $_GET['count'];
}
if(isset($_GET['search'])){
	$q = $_GET['search'];
}

$twitter_url = 'search/tweets.json';
$twitter_url .= '?q=' . $q;
$twitter_url .= '&count=' . $count;

//geocode format = latitude,longitude,radius (optional)
if(isset($_GET['geo'])){
	$geocode = $_GET['geo'];
	$twitter_url .= '&geocode=' . $geocode;
}

// Create a Twitter Proxy object from our twitter_proxy.php class
$twitter_proxy = new TwitterProxy(
	$oauth_access_token,			// 'Access token' on https://apps.twitter.com
	$oauth_access_token_secret,		// 'Access token secret' on https://apps.twitter.com
	$consumer_key,					// 'API key' on https://apps.twitter.com
	$consumer_secret		// 'API secret' on https://apps.twitter.com
);

// Invoke the get method to retrieve results via a cURL request
$tweets = $twitter_proxy->get($twitter_url);

echo $tweets;

?>