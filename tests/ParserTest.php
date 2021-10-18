<?php

namespace tests;

use Exceptions\ParserException;
use Parser\Parser;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    protected $fixture;

    protected function setUp(): void
    {
        $this->fixture = Parser::getInstance();
    }

    protected function tearDown(): void
    {
        $this->fixture = null;
    }

    /**
     * @dataProvider providerParseStringAsComplexArithmeticAction
     * @throws ParserException
     */
    public function testParseStringAsComplexArithmeticAction($stringToParse, $stringWithoutWhitespaces,$expectedResult)
    {
        $this->fixture->setStringToParse($stringToParse);

        $this->assertEquals($stringWithoutWhitespaces, $this->fixture->getStringToParse());
        $this->assertEquals($expectedResult, $this->fixture->parseStringAsComplexArithmeticAction());
    }

    /**
     * @return array[]
     */
    public function providerParseStringAsComplexArithmeticAction(): array
    {
        return [
            ['(2-  3i) * (3- 2i)','(2-3i)*(3-2i)',[2,-3,3,-2,'*']],
            ['(-2+5i)   :(-6-10i)','(-2+5i):(-6-10i)',[-2,5,-6,-10,':']],
        ];
    }
}
