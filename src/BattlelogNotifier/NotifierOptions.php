<?php
namespace BattlelogNotifier;

/**
 * Battlelog Notifier Options
 * @author Adam Lundrigan <adam@lundrigan.ca>
 */
class NotifierOptions
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

    public function __call($method, $args)
    {
        if ( preg_match("{^(get|set)(.*)$}is", $method, $matches) )
        {
            $localVarName = lcfirst($matches[2]);
            if ( array_key_exists($localVarName, get_object_vars($this)) )
            {
                if ( $matches[1] == 'get' )
                {
                    return $this->$localVarName;
                }
                elseif ( $matches[1] == 'set' && count($args) == 1 )
                {
                    $this->$localVarName = $args[0];
                    return $this;
                }
            }
        }
        throw new \BadMethodCallException('Invalid method call: ' . $method);
    }
}

