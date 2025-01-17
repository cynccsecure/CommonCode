<?php
namespace Flipside\Serialize;

class XMLSerializer implements ISerializer
{
    private $types = array('xml', 'application/xml', 'text/xml');

    public function supportsType($type)
    {
        foreach($this->types as $t)
        {
            if(strcasecmp($t, $type) === 0)
            {
                return true;
            }
        }
        return false;
    }

    public function serializeData(&$type, $array)
    {
        if($this->supportsType($type) === false)
        {
            return null;
        }
        $obj = new \Flipside\SerializableObject($array);
        $type = 'text/xml';
        return $obj->xmlSerialize();
    }
}
