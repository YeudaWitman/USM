<?php
session_start();
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

switch ( $uri['2'] ) {
    case "":
        if ( isset($_SESSION['user']) ) {
            include_once "./table.php";
            break;
        } else {
            header( "Location: signin.php" );
            exit();
        }

    case "users":
        if ( isset($_SESSION['user']) ) {
            include_once "./requestUsersData.php";
            break;
        } else {
            header( "Location: signin.php" );
            exit();
        }

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

?>