<?php

namespace Calculator;

interface iCalculator
{
    public static function devide($num1, $num2) : int;
    public static function multiply($num1, $num2) : int;
    public static function add($num1, $num2) : int;
    public static function subtract($num1, $num2) : int;
}