<?php

namespace tests;

use ComplexCalculator\ComplexCalculator;
use PHPUnit\Framework\TestCase;

class ComplexCalculatorTest extends TestCase
{
    /**
     * @dataProvider providerCMultiply
     */
    public function testCMultiply(array $nums, string $expectedResult)
    {
        $this->assertEquals($expectedResult, ComplexCalculator::cMultiply(...$nums));
    }

    /**
     * @dataProvider providerCSubtract
     */
    public function testCSubtract(array $nums, string $expectedResult)
    {
        $this->assertEquals($expectedResult, ComplexCalculator::cSubtract(...$nums));
    }

    /**
     * @dataProvider providerCAdd
     */
    public function testCAdd(array $nums, string $expectedResult)
    {
        $this->assertEquals($expectedResult, ComplexCalculator::cAdd(...$nums));
    }

    /**
     * @dataProvider providerCDevide
     */
    public function testCDevide(array $nums, string $expectedResult)
    {
        $this->assertEquals($expectedResult, ComplexCalculator::cDevide(...$nums));
    }

    /**
     * @dataProvider providerCalculate
     */
    public function testCalculate($calculatorInitData, $expectedResult)
    {
        $cCalculator = new ComplexCalculator(...$calculatorInitData);
        $this->assertEquals($expectedResult, $cCalculator->calculate());
    }

    public function providerCMultiply()
    {
        return [
            [[2,3,3,2], '0+13i'],
            [[-1,-4,-6,-10], '-34+34i'],
            [[5,5,-10,-10], '0-100i'],
            [[10,10,-5,-5], '0-100i']
        ];
    }

    public function providerCSubtract()
    {
        return [
            [[2,3,3,2], '-1+1i'],
            [[-1,-4,-6,-10], '5+6i'],
            [[5,5,-10,-10], '15+15i'],
            [[10,10,-5,-5], '15+15i']
        ];
    }

    public function providerCAdd()
    {
        return [
            [[2,3,3,2], '5+5i'],
            [[-1,-4,-6,-10], '-7-14i'],
            [[5,5,-10,-10], '-5-5i'],
            [[10,10,-5,-5], '5+5i']
        ];
    }

    public function providerCDevide()
    {
        return [
            [[2,3,3,2], '(12+5i):13+0i'],
            [[-1,-4,-6,-10], '(46+14i):136+0i'],
            [[5,5,-10,-10], '(-100+0i):200+0i'],
            [[10,10,-5,-5], '(-100+0i):50+0i']
        ];
    }

    public function providerCalculate()
    {
        return [
            //devide
            [[2,3,3,2,':'], '(12+5i):13+0i'],
            //multiply
            [[-1,-4,-6,-10,'*'], '-34+34i'],
            // add
            [[5,5,-10,-10,'+'], '-5-5i'],
            // subtract
            [[10,10,-5,-5,'-'], '15+15i']
        ];
    }
}
