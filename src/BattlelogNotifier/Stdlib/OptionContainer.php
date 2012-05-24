<?php
namespace BattlelogNotifier\Stdlib;

/**
 * Options Container Object
 * @author Adam Lundrigan <adam@lundrigan.ca>
 */
abstract class OptionsContainer
{
    public function __construct(array $cfg = array())
    {
        foreach ( $cfg as $key=>$value )
        {
           $method = 'set'.ucfirst($key);
           $this->{$method}($value);
        }
    }

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
