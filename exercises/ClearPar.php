<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 16/11/2017
 * Time: 14:46
 */

class ClearPar
{
    static function build($input)
    {
        $openParenthesis = 0; // 0: closed, 1: open
        $result = "";

        //Concatenate a "()" to $result when finds a ")" after "("
        for ($i = 0; $i < strlen($input); ++$i)
        {
            if ($openParenthesis == 0 && $input[$i] == '(')
            {
                $openParenthesis = 1;
            } else if ($openParenthesis == 1 && $input[$i] == ')') {
                $openParenthesis = 0;
                $result .= '()';

            }
        }

        return $result;
    }
}

echo ClearPar::build("()())()") . "<br />";
echo ClearPar::build("()(()") . "<br />";
echo ClearPar::build(")(") . "<br />";
echo ClearPar::build("((()") . "<br />";