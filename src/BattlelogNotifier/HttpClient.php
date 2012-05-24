<?php
namespace BattlelogNotifier;

class HttpClient
{
     /**
     * Configuration
     * @type HttpClientOptions
     */
    protected $options;

    /**
     * Create Notifier Instance
     * @param HttpClientOptions $cfg
     */
    public function __construct(HttpClientOptions $cfg)
    {
        $this->setOptions($cfg);
    }

    /**
     * Set Configuration Object
     * @param HttpClientOptions $cfg
     * @return self
     */
    public function setOptions(HttpClientOptions $cfg)
    {
        $this->options = $cfg;
        return $this;
    }

    /**
     * Get Configuration Object
     * @return HttpClientOptions
     */
    public function getOptions()
    {
        return $this->options;
    }
}
