<?php
namespace BattlelogNotifier;

/**
 * Battlelog Notifier Options
 * @author Adam Lundrigan <adam@lundrigan.ca>
 */
class NotifierOptions extends Stdlib\OptionsContainer
{
    protected $baseURL;
    protected $twitterUsername;
    protected $twitterPassword;
    protected $twitterOAuthToken;
    protected $twitterOAuthSecret;
    protected $twitterConsumerKey;
    protected $twitterConsumerSecret;
    protected $battlelogEmail;
    protected $battlelogPassword;
    protected $battlelogBaseUri = 'https://battlelog.battlefield.com';
}

