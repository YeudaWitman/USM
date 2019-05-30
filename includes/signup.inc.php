<?php
    if ( isset($_POST['submit']) ) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordRpt = $_POST['passwordRpt'];
        $signUpURL = "../signup";

        if ( empty( $email ) || empty( $password ) ) {
            header( "Location: $signUpURL?error=emptyfields" );
            exit();
        }
        else if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            header( "Location: $signUpURL?error=invalidemail" );
            exit();
        }
        else if ( $passwordRpt !== $password ) {
            header( "Location: $signUpURL?error=nomatchpwd" );
            exit();
        }
        else {
            include_once '../model/Users.php';
            $userData = new Users();
            $checkedUser = $userData->getUserByEmail( $email );
            if ( $checkedUser !== false ) {
                header( "Location: $signUpURL?error=emailtaken" );
                exit();
            } else {
                $hashedPassword = password_hash( $password, PASSWORD_DEFAULT );
                $newUser = array( "email" => $email, "password" => $hashedPassword );
                $userData->addUser( $newUser );
                header( "Location: ../signin.php" );
                exit();
            }
        }
    } else {
        header( "Location: $signUpURL.php" );
        exit();
    }
?>