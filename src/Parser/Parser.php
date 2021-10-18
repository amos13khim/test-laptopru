<?php

namespace Parser;

use Exceptions\ParserException;

class Parser
{
    private static $instance;
    private string $stringToParse;
    public static string $complexArithmeticActionPattern = '/^\(((\d+)|(\-\d+))(\+|\-)\d+[i]\)(\+|\-|\*|\:)\(((\d+)|(\-\d+))(\+|\-)\d+[i]\)$/';
    public static string $anyNonDigitPattern = '/\D/';
    public static string $anyDigitPattern = '/(\d+)|(\-\d+)/';

    private function __construct()
    {
    }

    /**
     * @return $this
     */
    public static function getInstance() : self
    {
        if( self::$instance === null ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return string
     */
    public function getStringToParse(): string
    {
        return $this->stringToParse;
    }

    /**
     * @param string $stringToParse
     */
    public function setStringToParse(string $stringToParse): void
    {
        $this->stringToParse = preg_replace('/\s/','', $stringToParse);
    }

    public function parseStringAsComplexArithmeticAction() : array
    {
        // Example (3+2i)-(4-7i)
        // validating the string
        if( preg_match(self::$complexArithmeticActionPattern, $this->stringToParse) === 0 ) {
            throw new ParserException('This pattern is not a Complex Arithmetic action');
        }
        // find the numbers from the string
        preg_match_all(self::$anyDigitPattern, $this->stringToParse, $numbers);
        $numbers = array_map('intval', $numbers[0]);
        if( count($numbers) < 4 ){
            throw new ParserException('Some numbers are missing');
        }

        // find operator
        preg_match('/\)[\+|\-|\:|\*]\(/', $this->stringToParse, $match);
        $operator = preg_replace('/[\)|\(]/', '', $match[0]);
        if( preg_match('/[\+|\-|\*|\:]/', $operator) === 0 ){
            throw new ParserException('No operator found');
        }

        array_push($numbers, $operator);
        return $numbers;
    }
}