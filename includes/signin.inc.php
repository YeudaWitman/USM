<?php
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)) {
            header("Location: ../signup?error=emptyfields");
            exit();
        } else {
            include_once '../model/data.php';
            $userData = new Users();
            $checkedUser = $userData->getUserByEmail($email);
            if($checkedUser == false) {
                header("Location: ../signin?error=nouser");
                exit();
            } else {
                if(password_verify($password, $checkedUser['password']) == false) {
                    header("Location: ../signin?error=incorrectpwd");
                    exit();
                } else {
                    session_start();
                    $userData->setLoggedin($checkedUser);
                    $_SESSION['user'] = $checkedUser;
                    header("Location: ../");
                    exit();
                }
            }
        }

    } else {
        header("Location: ../index.php");
        exit();
    }
?>