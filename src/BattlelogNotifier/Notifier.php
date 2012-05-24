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
        $this->setOptions($cfg);
    }

    /**
     * Set Configuration Object
     * @param NotifierOptions $cfg
     * @return self
     */
    public function setOptions(NotifierOptions $cfg)
    {
        $this->options = $cfg;
        return $this;
    }

    /**
     * Get Configuration Object
     * @return NotifierOptions
     */
    public function getOptions()
    {
        return $this->options;
    }
}

