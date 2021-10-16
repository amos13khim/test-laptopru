<?php declare(strict_types=1);

namespace tests;

use \Calculator\Calculator;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{

    /**
     * @dataProvider providerAdd
     * @param $num1
     * @param $num2
     * @param $result
     */
    public function testAdd($num1, $num2, $result)
    {
        $this->assertEquals($result, Calculator::add($num1,$num2));
    }

    /**
     * @dataProvider providerMultiply
     * @param $num1
     * @param $num2
     * @param $result
     */
    public function testMultiply($num1, $num2, $result)
    {
        $this->assertEquals($result, Calculator::multiply($num1,$num2));
    }

    /**
     * @dataProvider providerSubtract
     * @param $num1
     * @param $num2
     * @param $result
     */
    public function testSubtract($num1, $num2, $result)
    {
        $this->assertEquals($result, Calculator::subtract($num1,$num2));
    }

    /**
     * @dataProvider providerDevide
     * @param $num1
     * @param $num2
     * @param $result
     */
    public function testDevide($num1, $num2, $result)
    {
        $this->assertEquals($result, Calculator::devide($num1,$num2));
    }

    public function providerAdd() : array
    {
        return [
            [2,2,4],
            [2,1,3],
            [-10,6,-4],
        ];
    }

    public function providerSubtract() : array
    {
        return [
            [2,2,0],
            [2,1,1],
            [-10,6,-16],
        ];
    }

    public function providerMultiply() : array
    {
        return [
            [2,2,4],
            [2,1,2],
            [-10,6,-60],
        ];
    }

    public function providerDevide() : array
    {
        return [
            [2,2,1],
            [2,1,2],
            [-10,6,-1],
        ];
    }
}
