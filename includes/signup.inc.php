<?php
    if(isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)) {
            header("Location: ../signup?error=emptyfields");
            exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup?error=invalidemail");
            exit();
        }
        else {
            include_once '../model/Users.php';
            $userData = new Users();
            $checkedUser = $userData->getUserByEmail($email);
            if($checkedUser !== false) {
                header("Location: ../signup.php?error=emailtaken");
                exit();
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $newUser = array("email" => $email, "password" => $hashedPassword);
                $userData->addUser($newUser);
                header("Location: ../signin.php");
                exit();
            }
        }
    } else {
        header("Location: ../signup.php");
        exit();
    }
?>