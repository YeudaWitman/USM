<?php

class Errors {

    private $errorsArr = array(
        'emptyfields' => 'Empty fields',
        'nouser' => 'User not found',
        'incorrect' => 'Incorrect mail or password',
        'emailtaken' => 'Email is taken',
        'invalidemail' => 'Invalid email address',
        'nomatchpwd' => 'Passwords dont match'
    );
    
    function getErrorMsg( $index ) {
        if ( array_key_exists( $index, $this->errorsArr ) )  {
            return $this->errorsArr[$index];
        }
        else {
            return null;
        }
        
    }
}

?>