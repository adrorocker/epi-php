<?php
    
$stock = [310,315,275,295,260,270,290,230,255,250];

function getMaxProfit($stock)
{
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

echo getMaxProfit($stock);