<?php

namespace Epiphp\Arrays;

use Epiphp\Core\BaseFunctionInterface;

/**
 * 6.6
 *
 * Buy and sell a stock once.
 */
class BuyAndSellAStockOnce implements BaseFunctionInterface
{
    protected $payload = [310,315,275,295,260,270,290,230,255,250];

    public function title()
    {
        return "Buy and sell a stock once.\n\n";
    }

    public function description()
    {
        return "Buy and sell a stock once.\n\n";
    }

    public function execute()
    {
        $stock = $this->payload;
        $min = $stock[0];
        $max = 0;
        foreach ($stock as $key => $value) {        
            if ($value < $min) {
                $min = $value;
            }
            
            $result = $value - $min;
            
            if ($result > $max) {
                $max = $result;
            }
        }

        return $max;
    }
}