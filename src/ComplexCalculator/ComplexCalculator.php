<?php

namespace ComplexCalculator ;

use Calculator\Calculator;

class ComplexCalculator extends Calculator
{
    /**
     * @var string
     */
    private string $calculationString;
    /**
     * @var int
     */
    private int $R1;
    /**
     * @var int
     */
    private int $I1;
    /**
     * @var int
     */
    private int $R2;
    /**
     * @var int
     */
    private int $I2;
    /**
     * @var string
     */
    private string $operationType;
    /**
     * @var string
     */
    private string $result;

    /**
     * @param int $R1
     * @param int $I1
     * @param int $R2
     * @param int $I2
     * @param string $operationType
     */
    public function __construct(int $R1, int $I1, int $R2, int $I2, string $operationType)
    {
        $this->R1 = $R1;
        $this->I1 = $I1;
        $this->R2 = $R2;
        $this->I2 = $I2;
        $this->operationType = $operationType;
    }

    // (R1+I1) * (R2-I2) : (R2+I2) * (R2-I2)
    public static function cDevide(int $rNum1, int $iNum1, int $rNum2, int $iNum2): string
    {
        $result1 = self::cMultiply($rNum1,$iNum1,$rNum2, self::multiply($iNum2, -1));
        $result2 = self::cMultiply($rNum2,$iNum2,$rNum2, self::multiply($iNum2, -1));

        return '(' . $result1 . ') : ' . $result2;
    }

    public static function cMultiply(int $rNum1, int $iNum1, int $rNum2, int $iNum2): string
    {
        $num1 = self::multiply($rNum1, $rNum2);
        $num2 = self::multiply($iNum2, $rNum1);
        $num3 = self::multiply($iNum1, $rNum2);
        $num4 = self::multiply($iNum1, $iNum2);
        $num4 = self::multiply($num4, -1);
        $sign = '+';
        $rNum = self::add($num1, $num4);
        $iNum = self::add($num2, $num3);
        if( $iNum < 0 ) {
            $sign = '-';
            $iNum = self::multiply($iNum, -1);
        }
        return sprintf(
            '%d %s %d'. 'i',
            $rNum,
            $sign,
            $iNum
        );
    }

    public static function cAdd(int $rNum1, int $iNum1, int $rNum2, int $iNum2): string
    {
        $sign = '+';
        $rNum = self::add($rNum1, $rNum2);
        $iNum = self::add($iNum1, $iNum2);
        if( $iNum < 0 ) {
            $sign = '-';
            $iNum = self::multiply($iNum, -1);
        }

        return sprintf(
            '%d %s %d'. 'i',
            $rNum,
            $sign,
            $iNum
        );
    }

    public static function cSubtract(int $rNum1, int $iNum1, int $rNum2, int $iNum2): string
    {
        $sign = '+';
        $rNum = self::subtract($rNum1, $rNum2);
        $iNum = self::subtract($iNum1, $iNum2);

        if( $iNum < 0 ) {
            $sign = '-';
            $iNum = self::multiply($iNum, -1);
        }

        return sprintf(
            '%d %s %d'. 'i',
            $rNum,
            $sign,
            $iNum
        );
    }

    public function calculate() : string
    {
        switch ($this->operationType) {
            case ':' :
                return self::cDevide($this->R1, $this->I1, $this->R2, $this->I2);
            case '*' :
                return self::cMultiply($this->R1, $this->I1, $this->R2, $this->I2);
            case '+' :
                return self::cAdd($this->R1, $this->I1, $this->R2, $this->I2);
            case '-' :
                return self::cSubtract($this->R1, $this->I1, $this->R2, $this->I2);
        }

        return 'null';
    }


    /**
     * @param string $calculationString
     */
    public function setCalculationString(string $calculationString): void
    {
        $this->calculationString = $calculationString;
    }

}