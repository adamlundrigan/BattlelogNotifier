Battlelog Notifier
==================

Simple PHP + Zend Framework script to scrape your account on Battlefield 3's Battlelog site periodically to collect data on your friends' activity and send you Twitter DMs when they start and stop playing.

## Setup

1. Clone the repo to your local machine

2. Create an empty file ```last.json``` in the cloned source directory

3. Copy the provided ```config.inc.php.dist``` file to ```config.inc.php``` and fill in the necessary details

4. Create a crontab entry to run the script periodically.  Here's an example that runs the script every 5 minutes:
    
    ```*/5 * * * * /usr/bin/env php -q -f /path/to/BattlelogNotifier/notify.php >/path/to/BattlelogNotifier/run.log 2>&1```

5. OPTIONAL: To use the included friend status display page, symlink ```display.php``` into a location on your server that is publicly accessible.

Now you'll get a Twitter DM whenever your friends are playing Battlefield 3 so you don't miss out on the action!

# TODOs

* Actually use the CookieJar.  Persist the cookies returned by battlelog in the hopes that we wouldn't have to keep logging in on each request.
* Find a more elegant way of getting the JSON (say, sniff out a web service...I have no no doubt that there is one)


## Disclaimer

This code is provided AS-IS, with no warranty (explicit or implied) and has not been vetted or tested for deployment in a production environment.  Use of this code at your own risk. 

Released under Public Domain.  Associated libraries carry their own individual licenses where applicable. 
