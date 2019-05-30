<?php
    if ( isset($_POST['submit']) ) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $signinURL = "../signin";

        if ( empty( $email ) || empty( $password ) ) {
            header( "Location: $signinURL?error=emptyfields" );
            exit();
        } else {
            include_once '../model/Users.php';
            $userData = new Users();
            $checkedUser = $userData->getUserByEmail( $email );
            if ( $checkedUser == false ) {
                header( "Location: $signinURL?error=nouser" );
                exit();
            } else {
                if ( password_verify( $password, $checkedUser['password'] ) == false ) {
                    header( "Location: $signinURL?error=incorrect" );
                    exit();
                } else {
                    session_start();
                    $userData->setLoggedin( $checkedUser );
                    $_SESSION['user'] = $email;
                    header( "Location: ../" );
                    exit();
                }
            }
        }

    } else {
        header( "Location: ../index.php" );
        exit();
    }
?>