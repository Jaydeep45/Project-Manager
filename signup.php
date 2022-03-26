<?php
    include_once "connection.php";
    $con = Connection::connect();
    session_start();
    header('location:home.html');
    if(isset($_POST['signup'])) {
        $user_name = $_POST['user_name'];
        $user_phone = $_POST['user_phone'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_psw'];
        $encrypted_password = password_hash($user_password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (user_name, user_mobile, user_email, user_password) VALUES (:uname, :uphone, :uemail, :upsw)";
        $statement = $con->prepare($sql);
        $statement->execute([
                ':uname'=>$user_name,
                ':uphone'=> $user_phone,
                ':uemail'=>$user_email,
                ':upsw'=>$encrypted_password,
        ]);
    }