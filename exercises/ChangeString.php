<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 16/11/2017
 * Time: 14:28
 */

class ChangeString
{
    private $alphabet;

    function __construct()
    {
        $this->alphabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','ñ','o','p','q','r','s','t','u','v','w','x','y','z'];
    }

    function build($input)
    {
        for ($i = 0; $i < strlen($input); ++$i)
        {
            $input[$i] = $this->findNextCharacter($input[$i]);
        }

        return $input;
    }

    //Finds the next character for each one of the characters in the string
    function findNextCharacter($character)
    {
        //Verifies if it's an uppercase character
        $isUppercase = ($character == strtoupper($character));

        //Finds the character in alphabet. If not, returns the same character
        $position = array_search(strtolower($character), $this->alphabet);

        if ($position === false)
            return $character;

        //Sets the next character for the found character
        if ($position === count($this->alphabet) - 1)
            $position = 0;
        else
            $position++;

        //If it's an uppercase, returns the next uppercase character
        if ($isUppercase)
            return strtoupper($this->alphabet[$position]);

        return $this->alphabet[$position];
    }
}

$changeString = new ChangeString();

echo $changeString->build("123 abcd*3") . "<br />";
echo $changeString->build("**Casa 52") . "<br />";
echo $changeString->build("**Casa 52Z") . "<br />";