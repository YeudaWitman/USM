<?php

if ( isset( $_SESSION['user'] ) ) {

    $currentRequest = date( "H:i:s" , $_SERVER['REQUEST_TIME'] );
    $lastRequest = date( $_SESSION['lastReq']);

    if ( strtotime($currentRequest) - strtotime($lastRequest) > 10 ) {
        require_once './logout.php';
        header( "Location: ./logout.php" );
        exit();
    } 

        include_once './model/Users.php';
        $data = new Users();
        $users = $data->getUsers();
        $output = array();
        
        foreach ($users as $key => $value) {
            unset($value['password']);
            array_push($output, $value);
        }
    
        if ( count($output) == 0 ) {
            header( 'HTTP/1.0 204 No Content', TRUE, 204 );
        } else {
            echo json_encode( $output );
            $_SESSION['lastReq'] = date( "H:i:s" );
        }

} else {
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    exit();
}

?>