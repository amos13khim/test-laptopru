<?php

namespace Parser;

class Parser
{
    private static $instance;
    private string $stringToParse;
    public static string $complexArithmeticActionPattern = '/^\(\d+\.?\d*(\+|\-)\d+\.?\d*[i]\)(\+|\-|\*|\:)\(\d+\.?\d*(\+|\-)\d+[i]\)$/';
    public static string $anyNonDigitPattern = '/\D+/';

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
        $this->stringToParse = $stringToParse;
    }

    public function parseStringAsComplexArithmeticAction() : array
    {
        // Example (3+2i)-(4-7i)
        // validating the string
        $result = preg_match(self::$complexArithmeticActionPattern, $this->stringToParse);
        if( $result === 0 ) {
            throw new \Exception('This pattern is not a Complex Arithmetic action');
        }
        // getting the numbers from the string
        $result = array_filter(preg_split(self::$anyNonDigitPattern, $this->stringToParse));
        preg_match('/\)[\+|\-|\:|\*]\(/', $this->stringToParse, $match);
        $operator = preg_replace('/[\)|\(]/', '', $match[0]);
        array_push($result, $operator);
        return $result;
    }
}