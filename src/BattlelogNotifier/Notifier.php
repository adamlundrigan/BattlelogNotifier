<?php
namespace BattlelogNotifier;

/**
 * Battlelog Notifier
 * @author Adam Lundrigan <adam@lundrigan.ca>
 */
class Notifier
{
    /**
     * Configuration
     * @type NotifierOptions
     */
    protected $options;

    /**
     * Create Notifier Instance
     * @param NotifierOptions $cfg
     */
    public function __construct(NotifierOptions $cfg)
    {
        $this->options = $cfg;
    }
}

