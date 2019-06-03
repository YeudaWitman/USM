<?php

class Users
{
    private $usernames;
    private $data;
    private $json_arr;
    private $dataURL = __DIR__.'./users.json';
    
    function __construct() {
        date_default_timezone_set( "Asia/Tel_Aviv" ); 
        $this->data = file_get_contents( $this->dataURL );
        $this->json_arr = json_decode( $this->data, true );
        $this->usernames = array();
    }

    public function getUsers() {
        foreach ( $this->json_arr as $key => $value ) {
            array_push( $this->usernames, $value );
        }
        return $this->usernames;
    }

    public function addUser( $userData ) {
        $now = date( "m/d/y H:i:s" );
        $user = array(
            "email" => $userData["email"], 
            "password" => $userData["password"], 
            "connectionTime" => $now, 
            "connected" => false,
            "IP" => $_SERVER['REMOTE_ADDR']
        );
        array_push( $this->json_arr,  $user );
        file_put_contents( $this->dataURL, json_encode( $this->json_arr ) );
    }

    public function getUserByEmail( $email ) {
        $filteredUser;
        foreach ( $this->json_arr as $value ) {
            if ( $value['email'] === $email ) {
                $filteredUser = $value;
                break;
            } else {
                $filteredUser = false;
            }
        }
        return $filteredUser;
    }

    public function setLoggedin( $user ) {
        $now = date( "m/d/y H:i:s" );
        $userIndex = array_search( $user, $this->json_arr );
        $this->json_arr[$userIndex]["connectionTime"] = $now;
        $this->json_arr[$userIndex]["connected"] = true;
        file_put_contents( $this->dataURL, json_encode( $this->json_arr ) );
    }

    public function setLoggedOut( $userMail ) {
        $user = $this->getUserByEmail( $userMail );
        $userIndex = array_search( $user, $this->json_arr );
        $this->json_arr[$userIndex]["connected"] = false;
        file_put_contents( $this->dataURL, json_encode( $this->json_arr ) );
    }

}

?>