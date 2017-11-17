<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 16/11/2017
 * Time: 14:41
 */

class CompleteRange
{
    static function build($numberArray)
    {
        $arraySize = count($numberArray);

        if ($arraySize == 0)
            return [];

        $firstNumber    = $numberArray[0];
        $lastNumber     = $numberArray[$arraySize - 1];

        return range($firstNumber, $lastNumber); // Creates an array with all the numbers between the first and last of the original array
    }
}



$result = CompleteRange::build([1, 2, 4, 5]);
print_r($result);

$result = CompleteRange::build([2,4,9]);
print_r($result);

$result = CompleteRange::build([55,58,60]);
print_r($result);