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
        return $this->errorsArr[$index];
    }
}

?>