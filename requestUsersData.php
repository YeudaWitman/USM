<?php

if ( isset( $_SESSION['user'] ) ) {
    include_once './includes/session.php';
    $_SESSION['lastReq'] = date( "H:i:s" );
    $sessTime = $_SESSION['start'];
    // echo ( date( "H:i:s" ,$_SERVER['REQUEST_TIME'] ) );
    // var_dump($_SESSION);
    /*
    *if ( strtotime($now) - strtotime($sessTime) > 300 ) {
    *   header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    *   exit();
    *} 
    */
        include_once './model/Users.php';
        $data = new Users();
        $users = $data->getUsers();
        $output = array(
            'session_start' => $_SESSION['start'],
            'data' => array());
        
        foreach ($users as $key => $value) {
            unset($value['password']);
            array_push($output['data'], $value);
        }
    
        if ( count($output['data']) == 0 ) {
            header( 'HTTP/1.0 204 No Content', TRUE, 204 );
        } else {
            echo json_encode( $output );
        }

} else {
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    exit();
}

?>