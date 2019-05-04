<?php

namespace Plugin\ZaifPayment\Entity;

class ZaifPayment extends \Eccube\Entity\AbstractEntity
{
    private $mainkey;
    private $subkey;
    private $value;

    public function getMainKey()
    {
        return $this->mainkey;
    }

    public function setMainKey($mainkey)
    {
        $this->mainkey = $mainkey;
        return $this;
    }
    
    public function getSubkey()
    {
        return $this->subkey;
    }

    public function setSubkey($subkey)
    {
        $this->subkey = $subkey;
        return $this;
    }
    
    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}
