<?php

if ( isset($_SESSION['user']) ) {

    include_once('./model/Users.php');
    $data = new Users();
    $output = $data->getUser();

    echo json_encode($output);

} else {
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    exit();
}

?>