<?php

class Users
{
    private $usernames;
    private $data;
    private $json_arr;
    
    function __construct() {
        $this->data = file_get_contents(__DIR__.'./users.json');
        $this->json_arr = json_decode($this->data, true);
        $this->usernames = array();
        // $this->usernames = array(
        //     array('userName' => 'moshe', 'connectionTime' => 'aaa', 'lastUpdate' => date("h:i:sa"), 'IP' => '1.0.0.127', 'connected' => false), 
        //     array('userName' => 'david', 'connectionTime' => 'bbb', 'lastUpdate' => date("h:i:sa"), 'IP' => '135.156.156.555', 'connected' => true), 
        //     array('userName' => 'john', 'connectionTime' => 'ccc', 'lastUpdate' => date("h:i:sa"), 'IP' => '651.46.752.425', 'connected' => true)
        // );
    }

    public function getData() {
        foreach ($this->json_arr as $key => $value) {
            array_push($this->usernames, $value);
        }
        return $this->usernames;
    }

    public function addUser($userData) {
        $now = date("m/d/y H:i:s");
        $user = array(
            "email" => $userData["email"], 
            "password" => $userData["password"], 
            "connectionTime" => $now, 
            "connected" => true,
            "IP" => '123'
        );
        array_push($this->json_arr,  $user);
        file_put_contents('../model/users.json', json_encode($this->json_arr));
    }

    public function getUserByEmail($email) {
        $filteredUser;
        foreach ($this->json_arr as $value) {
            if( $value['email'] === $email ) {
                $filteredUser = $value;
            } else {
                $filteredUser = false;
            }
        }
        return $filteredUser;
    }

    public function setLogginTime($user) {
        $now = date("m/d/y H:i:s");
        $userIndex = array_search($user, $this->json_arr);
        $this->json_arr[$userIndex]["connectionTime"] = $now;
        file_put_contents('../model/users.json', json_encode($this->json_arr));
    }

}

?>