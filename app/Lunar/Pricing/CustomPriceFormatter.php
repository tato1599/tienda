<?php

namespace App\Lunar\Pricing;

use Lunar\Pricing\DefaultPriceFormatter;

class CustomPriceFormatter extends DefaultPriceFormatter
{
    public function formatted(...$arguments): mixed
    {
        $formatted = parent::formatted(...$arguments);
        
        if (is_string($formatted)) {
            // Replace non-breaking space with regular space
            $formatted = str_replace("\u{00A0}", ' ', $formatted);
            // Remove any other non-ascii characters
            $formatted = preg_replace('/[^\x20-\x7E]/', '', $formatted);
        }

        return $formatted;
    }
}
