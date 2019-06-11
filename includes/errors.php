<?php

class Errors {

    private static $errorsArr = array(
        'emptyfields' => 'Empty fields',
        'nouser' => 'User not found',
        'incorrect' => 'Incorrect mail or password',
        'emailtaken' => 'Email is taken',
        'invalidemail' => 'Invalid email address',
        'nomatchpwd' => 'Passwords dont match'
    );
    
    public static function getErrorMsg( $index ) {
        return array_key_exists( $index, self::$errorsArr ) ? self::$errorsArr[$index] : null;
        
        // if ( array_key_exists( $index, self::$errorsArr ) )  {
        //     return self::$errorsArr[$index];
        // }
        // else {
        //     return null;
        // }
        
    }
}

?>