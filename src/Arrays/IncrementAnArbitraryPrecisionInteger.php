<?php

namespace Epiphp\Arrays;

use Epiphp\Core\BaseFunctionInterface;

/**
 * 6.2
 *
 * Increment an arbitrary precision-integer.
 */
class IncrementAnArbitraryPrecisionInteger implements BaseFunctionInterface
{
    protected $payload = [9,9,9];

    public function title()
    {
        return "Increment an arbitrary precision-integer.\n\n";
    }

    public function description()
    {
        return "Increment an arbitrary precision-integer.\n\n";
    }

    public function execute()
    {
        $payload = $this->payload;
        $count = count($payload);
    
        $payload[$count-1] = $payload[$count-1] + 1;
        for ($i = $count-1; $i > 0 && $payload[$i] == 10; $i--) {
            
            if (($payload[$i] % 10) === 0) {
                $payload[$i] = 0;
                $payload[$i-1]++; 
            }
            
        }

        if ($payload[0] == 10){
            $payload[0] = 0;
            array_unshift($payload,1);
        }
        
        return $payload;
    }
}