<?php

namespace Calculator;

class Calculator implements iCalculator
{

    /**
     * @param $num1
     * @param $num2
     * @return int
     */
    public static function devide($num1, $num2): int
    {
        return $num1 / $num2;
    }

    /**
     * @param $num1
     * @param $num2
     * @return int
     */
    public static function multiply($num1, $num2): int
    {
        return $num1 * $num2;
    }

    /**
     * @param $num1
     * @param $num2
     * @return int
     */
    public static function add($num1, $num2): int
    {
        return $num1 + $num2;
    }

    /**
     * @param $num1
     * @param $num2
     * @return int
     */
    public static function subtract($num1, $num2): int
    {
        return $num1 - $num2;
    }
}