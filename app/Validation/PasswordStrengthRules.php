<?php

namespace App\Validation;

class PasswordStrengthRules {
    public function strong(string $password, string &$error = null) {
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        
        if(!$number || !$specialChars) {
            $error = 'Password should contain ateast one number and one special character';
            return false;
        } else {
            return true;
        }
    }
}