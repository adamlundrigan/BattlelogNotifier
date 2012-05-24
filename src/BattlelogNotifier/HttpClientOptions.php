<?php
namespace BattlelogNotifier;

/**
 * Battlelog Notifier Options
 * @author Adam Lundrigan <adam@lundrigan.ca>
 */
class HttpClientOptions extends Stdlib\OptionsContainer
{
    protected $battlelogEmail;
    protected $battlelogPassword;
    protected $battlelogBaseUri = 'https://battlelog.battlefield.com';
}

