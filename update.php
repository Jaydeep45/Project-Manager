<?php
    include_once "connection.php";
    $con = Connection::connect();
    session_start();
    $id = $_GET['id'];
    header('location:home.php');
    if(isset($_POST['update'])) {
        $user_name = trim($_POST['user_name']);
        $user_phone = trim($_POST['user_mobile']);
        $user_email = trim($_POST['user_email']);
        $user_status = $_POST['user_status'];
        $user_desc = $_POST['user_desc'];
        $user_skills = $_POST['skills'];
        $skills = "";
        foreach($user_skills as $skill) {
            $skills .= $skill." ";
        }
        $sql = "Update users set user_name = :uname, user_mobile = :uphone, user_email = :uemail, user_status = :ustatus, user_desc = :udesc, user_skills = :uskills where id = :uid";
        $statement = $con->prepare($sql);
        $statement->execute([
                ':uname'=>$user_name,
                ':uphone'=> $user_phone,
                ':uemail'=>$user_email,
                ':ustatus'=>$user_status,
                ':udesc'=>$user_desc,
                'uskills'=>$skills,
                'uid'=>$id
        ]);
        $_SESSION['user_email'] = $user_email;
    }