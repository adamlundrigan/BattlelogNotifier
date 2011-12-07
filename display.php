<?php

require_once __DIR__ . "/config.inc.php";
require_once "Zend/Json.php";
$json = Zend_Json::decode(file_get_contents(__DIR__ . '/last.json'));

if ( is_array($json) )
{
	echo '<html>';
	echo '<head>';
	echo '<meta http-equiv="refresh" content="300;url=' . YOUR_DISPLAY_SCRIPT_URL . '">';
	echo '</head>';
	echo '<body>';
	echo '<style>';
	echo 'td,th { border: 1px solid #c0c0c0; padding: 4px; }'."\n";
	echo 'th { background-color: #a5a5a5; color: white; }'."\n";
	echo '.playing td { background-color: rgb(0,255,0); };'."\n";
	echo '</style>';
	echo '<table>';
	echo '  <thead>';
	echo '    <tr>';
	echo '      <th>User</th>';
	echo '      <th>State</th>';
	echo '      <th>Playing</th>';
	echo '      <th>Server</th>';
	echo '    </tr>';
	echo '  </thead>';
	echo '  <tbody>';
	foreach ( $json as $UID=>$Data )
	{
		echo '    <tr class="' . ($Data['presence']['isPlaying'] ? 'playing' : '' ) . '">';
		echo '      <td>' . $Data['username'] . '</td>';
		echo '      <td>' . ( @$Data['presence']['isAway'] ? 'Away' : ( $Data['presence']['isOnline'] ? 'Online' : 'Offline' ) ) . '</td>';
		echo '      <td style="text-align:center;font-weight: bold;">' . ( $Data['presence']['isPlaying'] ? 'Y' : 'N' ) . '</td>';
		echo '      <td>' . @$Data['presence']['serverName'] . '</td>';
		echo '    </tr>';
	}
	echo '  </tbody>';
	echo '</table>';

	echo '<p>Last Updated: ' . date("r", filemtime(__DIR__ . '/last.json')) . '</p>';
	echo '</body>';
	echo '</html>';
}
