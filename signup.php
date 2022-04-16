<?php
    include_once "connection.php";
    $con = Connection::connect();
    session_start();
    header('location:home.php');
    if(isset($_POST['signup'])) {
        $user_name = trim($_POST['user_name']);
        $user_phone = trim($_POST['user_phone']);
        $user_email = trim($_POST['user_email']);
        $user_password = trim($_POST['user_psw']);
        $encrypted_password = password_hash($user_password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (user_name, user_mobile, user_email, user_password) VALUES (:uname, :uphone, :uemail, :upsw)";
        $statement = $con->prepare($sql);
        $statement->execute([
                ':uname'=>$user_name,
                ':uphone'=> $user_phone,
                ':uemail'=>$user_email,
                ':upsw'=>$encrypted_password,
        ]);
        $_SESSION['user_email'] = $user_email;
    }