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
     * HTTP Client
     * @type \Zend_Http_Client
     */
    protected $httpClient;

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

    /**
     * Set Raw HTTP Client
     * @param \Zend_Http_Client $zhc
     * @return self
     */
    public function setHttpClient(\Zend_Http_Client $zhc)
    {
        $this->httpClient = $zhc;
        return $this;
    }

    /**
     * Get Raw HTTP Client
     * @return \Zend_Http_Client
     */
    public function getHttpClient()
    {
        if ( is_null($this->httpClient) )
        {
            require_once 'Zend/Http/Client.php';
            $this->httpClient = new \Zend_Http_Client();
        }
        return $this->httpClient;
    }
}
