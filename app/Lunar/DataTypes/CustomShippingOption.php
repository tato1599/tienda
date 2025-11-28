<?php

namespace App\Lunar\DataTypes;

use Lunar\DataTypes\ShippingOption;

class CustomShippingOption extends ShippingOption
{
    public function toArray(): array
    {
        $data = parent::toArray();
        
        // Sanitize formatted price to be ASCII safe
        if (isset($data['price']['formatted'])) {
            $data['price']['formatted'] = str_replace("\u{00A0}", ' ', $data['price']['formatted']);
            // Also replace any other non-ascii chars just in case
            $data['price']['formatted'] = preg_replace('/[^\x20-\x7E]/', '', $data['price']['formatted']);
        }
        
        // Also sanitize the top-level formatted price if it exists
        if (isset($data['formatted'])) {
             $data['formatted'] = str_replace("\u{00A0}", ' ', $data['formatted']);
             $data['formatted'] = preg_replace('/[^\x20-\x7E]/', '', $data['formatted']);
        }

        return $data;
    }
    
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
