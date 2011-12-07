<?php

chdir(__DIR__);

//NOTE: Zend Framework v1 must be on your include path

// Application Configuration
require_once "config.inc.php";

// Required Components
require_once "Zend/Json.php";
require_once "Zend/Http/Client.php";
require_once "Zend/Oauth/Token/Access.php";
require_once "Zend/Service/Twitter.php";

// Log into battlelog
$c = new Zend_Http_Client();
$r = $c->setCookieJar()
       ->setUri('https://battlelog.battlefield.com/bf3/gate/login/')
       ->setParameterPost('redirect', '')
       ->setParameterPost('email', YOUR_BATTLELOG_EMAIL)
       ->setParameterPost('password', YOUR_BATTLELOG_PASSWORD)
       ->setParameterPost('remember', '1')
       ->setParameterPost('submit', 'Sign In')
       ->request('POST');
$contents = $r->getBody();


// Load the previous 
$LastUserInfo = is_readable('last.json')
	      ? Zend_json::decode(file_get_contents("last.json"))
	      : array();

// Hunt down and chop out the correct JSON bit
if ( preg_match_all('{<script type="text/javascript">([^<]+)</script>}s', $contents, $Matches) )
{
	foreach ( $Matches[1] as $K=>$ScriptContents )
	{
		if ( preg_match('{"username":}s', $ScriptContents) )
		{
			if ( preg_match('{feed\.likeitems\.surface_2_2\.render\(([^)]*)\)}s', $ScriptContents, $FunctionMatches) )
			{
				if ( preg_match('{\{.*\}}s', $FunctionMatches[1], $JSONMatches) )
				{
					// Decode the captured JSON bit
					$Data = Zend_Json::decode($JSONMatches[0]);
					if ( is_array($Data) )
					{
						if ( is_array($Data['users']) )
						{
							$Started = array();
							$Stopped = array();
							foreach ( $Data['users'] as $UID=>$UserInfo )
							{
								if ( $UserInfo['presence']['isPlaying'] && !@$LastUserInfo[$UID]['presence']['isPlaying'] )
								{
									$Started[] = $UserInfo['username'];
								}
								elseif ( !$UserInfo['presence']['isPlaying'] && @$LastUserInfo[$UID]['presence']['isPlaying'] )
								{
									$Stopped[] = $UserInfo['username'];
								}
							}


							$msg = '';
							if ( count($Started) > 0 )
								$msg .= implode(", ",$Started) . (count($Started)>1 ? ' have' : ' has') . ' started playing BF3.  ';
							if ( count($Stopped) > 0 )
								$msg .= implode(", ",$Stopped) . (count($Stopped)>1 ? ' have' : ' has') . ' stopped playing BF3.';
							if ( !empty($msg) )
							{
								// Connect to Twitter
								$token = new Zend_Oauth_Token_Access;
								$token->setParams(array(
								    'oauth_token' => YOUR_TWITTER_OAUTH_TOKEN,
								    'oauth_token_secret' => YOUR_TWITTER_OAUTH_SECRET
								));
								$twitter = new Zend_Service_Twitter(array(
								    'consumerKey' => YOUR_TWITTER_CONSUMER_KEY,
								    'consumerSecret' => YOUR_TWITTER_CONSUMER_SECRET,
								    'accessToken' => $token
								));
								$twitter->directMessage->new(YOUR_TWITTER_USERNAME, "{$msg} | " . YOUR_DISPLAY_SCRIPT_URL);
							}

							/// Store the gleaned information to file for next time
							file_put_contents("last.json", Zend_Json::encode($Data['users']));
							break;
						}
					}
				}
			}
		}
	}
}
