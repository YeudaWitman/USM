<?php
    session_start();
    include_once './model/data.php';
    $userData = new Users();
    $userData->setLoggedOut($_SESSION['user']);
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
