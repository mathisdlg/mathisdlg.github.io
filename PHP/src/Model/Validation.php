<?php

namespace Model;

class Validation
{
    
    private static function filterValidate(&$input, int $validator, array $regex=null) : bool
    {
        if ($regex != null){
            return filter_var($input, $validator, $regex);
        }
        return filter_var($input, $validator);
    }
    
    private static function filterRegex($input, string $regex) : bool
    {
        return preg_match($regex, $input);
    }
    
    public static function isPage($input) : bool
    {
        return self::filterRegex($input, "/^[A-Z][a-zA-Z]+$/");
    }
}