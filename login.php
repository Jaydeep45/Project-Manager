<?php
    include_once "connection.php";
    $con = Connection::connect();
    session_start();
    header('location:home.php');
    if(isset($_POST['login'])) {
        $user_email = trim($_POST['user_email']);
        $user_password = trim($_POST['user_psw']);
        $sql = "select * from users where user_email = :uemail";
        $statement = $con->prepare($sql);
        $statement->execute([
            ':uemail'=> $user_email
        ]);
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        if($statement->rowCount()) {
            $hash_password = $data['user_password'];
            if(!password_verify($user_password, $hash_password)) {
                header('location:index.php');
            }
            else {
                $_SESSION['user_email'] = $user_email;
            }
        }
        else {
            $_SESSION['error'] = "Invalid email or password";
            header('location:index.php');
        }
    }