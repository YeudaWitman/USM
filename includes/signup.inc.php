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
            include_once '../model/data.php';
            $userData = new Users();
            $data = file_get_contents('../model/users.json');
            $json_arr = json_decode($data, true);

            foreach ($json_arr as $key => $value) {
                if(in_array($email, $value)) {
                    echo $email;
                //header("Location: ../signup?error=emailexist&email=".$email);
                //exit();
                }
            }
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $newUser = array("email" => $email, "password" => $hashedPassword);
            $userData->addUser($newUser);
            header("Location: ../signin.php");
            exit();
        }
    } else {
        header("Location: ../signup.php");
        exit();
    }
?>