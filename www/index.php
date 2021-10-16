<?php
/**
 * Текст задания:
 * Требуется написать класс по работе с комплексными числами, реализовать операции сложения,
 * вычитания, умножения и деления, а также провести тестирование его работы unit тестами.
 * Результат тестового тоже прислать ссылкой на git.
 */

spl_autoload_register(function (string $className) {
    require_once __DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
});

use ComplexCalculator\ComplexCalculator;
use Parser\Parser;

$calculation_string = $_GET['complexNumbersManipulation'] ?? null;
if( $calculation_string ) {
    $request = $calculation_string;
    $parser = Parser::getInstance();
    $parser->setStringToParse($calculation_string);
    try {
        $result = $parser->parseStringAsComplexArithmeticAction();
    } catch (Exception $e) {
        echo '<p style="color: white; background-color: red; padding:2px 5px;">' . $e->getMessage() . '</p>';
        include __DIR__ . '/../templates/calculator-form.php';
        return;
    }

    $calculator = new ComplexCalculator(...$result);
    $calculator->setCalculationString($calculation_string);
    $result = $calculator->calculate();
}
include __DIR__ . '/../templates/calculator-form.php';
