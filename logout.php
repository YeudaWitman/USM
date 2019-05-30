<?php
    session_start();
    include_once './model/Users.php';
    $userData = new Users();
    $userData->setLoggedOut( $_SESSION['user'] );
    session_unset();
    session_destroy();
    header( "Location: ./" );
    exit();
