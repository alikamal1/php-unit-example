<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Division extends OperationAbstract implements OperationInterface
{

    public function calculate()
    {
        if (count($this->operands) === 0) {
            throw new NoOperandsException;
        }
        $this->operands = array_filter($this->operands);
        $result = 0;
        foreach ($this->operands as $index => $operand) {
            if ($index === 0) {
                $result = $operand;
                continue;
            }
            $result /= $operand;
        }
        return $result;
        /*  or
        return array_reduce($this->operands, function($a, $b){
            if($a !== null && $b !=== null) {
                return $a/$b;
            }
            return $b;
        });
        */
    }
}
