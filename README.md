John's Twitter Proxy
=============

Ok I wrote this quickly for you guys as I couldn't find one easy enough for you to use!

It's pretty simple, first download and unzip the package (or git clone)

Then open config.php and add the keys from your twitter app (create an app at apps.twitter.com) now upload everything to the root of your azure server (i.e commit through phpstorm)

The proxy provides 5 functions all return JSON - no cors issues. All the responces are exactly the same as those documented in the twitter API.
I've tried to include all the functions I think you guys will need.


User Searching -
takes two parameters name and count eg

http://your-server/twipp/user_search.php?name=RGU&count=100

will return up to 100 users that look a bit like (contain RGU) RGU


User Timeline -
takes two parameters username and count eg

http://your-server/twipp/user_timeline.php?search=wildfireone&count=100

will return up to 100 tweets from me (wildfireone)


Tweet Searching -
takes two parameters search and count eg

http://your-server/twipp/tweet_search.php?search=RGUhack&count=100

will return up to 100 tweets containing "RGUhack"
You can also provide a geocode (lat,long,radius) to limit where the tweets come from


Closest Trends -
takes two parameters lat and long eg

http://your-server/twipp/trend_closest.php?lat=57.454&lng=-2.34

will return a list of WoeIDs of where nearby twitter trends are happening. Woeids are unique identifiers for geographial areas.


Trend Retrevial -
gets trends for a given WoeID

http://your-server/twipp/get_trends.php?id=19344
