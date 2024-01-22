<?php

    class Validation
    {
        
        private static function filterValidate(&$input, int $sanitizer, int $validator) : bool
        {
            $sanitized = filter_var($input, $sanitizer);
            if (filter_var($sanitized, $validator) !== false) {
                $input = $sanitized;
                return true;
            }
            return false;
        }
    }