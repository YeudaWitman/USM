<?php
session_start();
if(isset($_SESSION['user'])) {

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode( '/', $uri );

    switch ($uri['2']) {
        case "":
            include_once "./table.php";
            break;
        case "users":
            include_once "./requestUsersData.php";
            break;
        case "signin":
            include_once "./signin.php";
            break;
        case "signup":
            include_once "./signup.php";
            break;
        default:
            include_once "./404.php";
            break;
    }

} else {
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    header( "Location: signin.php" );
    exit();
}

?>