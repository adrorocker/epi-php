<?php

namespace Epiphp\Arrays;

use Epiphp\Core\BaseFunctionInterface;

/**
 * 6.16
 *
 * The Suduku checker problem.
 */
class TheSudukuChecker implements BaseFunctionInterface
{
    protected $payload = [
        [5,3,0,0,7,0,0,0,0],
        [6,0,0,1,9,5,0,0,0],
        [0,9,8,0,0,0,0,6,0],
        [8,0,0,0,0,6,0,0,3],
        [4,0,0,8,0,3,0,0,1],
        [7,0,0,0,2,0,0,0,6],
        [0,6,0,0,0,0,2,8,0],
        [0,0,0,4,1,9,0,0,5],
        [0,0,0,0,8,0,0,7,9],
    ];

    protected $cols = [];

    public function title()
    {
        return "The Suduku checker problem.\n\n";
    }

    public function description()
    {
        return "The Suduku checker problem.\n\n";
    }

    public function execute()
    {
        return $this->isValidSuduku($this->payload);
    }

    protected function isValidSuduku($suduku)
    {
        for ($i = 0; $i < 9; $i++) { 
            if ($this->hasDuplicates($suduku,$i,$i+1,0,9)) {
                return false;
            }
        }

        for ($j = 0; $j < 9; $j++) { 
            if ($this->hasDuplicates($suduku,0,9,$j,$j+1)) {
                return false;
            }
        }

        for ($x = 0; $x < 3; $x++) { 
            for ($y = 0; $y < 3; $y++) { 
                if ($this->hasDuplicates($suduku,3*$x,3*($x+1),3*$y,3*($y+1))) {
                    return false;
                }
            }
        }

        return true;
    }

    protected function hasDuplicates($partial, $startRow, $endRow, $startCol, $endCol)
    {
        $isPresent = [];
        for ($i = $startRow; $i < $endRow; $i++) { 
            for ($j = $startCol; $j < $endCol; $j++) { 
                if ($partial[$i][$j] != 0 && isset($isPresent[$partial[$i][$j]])) {
                    return true;
                }
                $isPresent[$partial[$i][$j]] = true;    
            }
        }

        return false;
    }
}