<?php
    include_once "connection.php";
    $con = Connection::connect();
    if(isset($_POST['user_email'])) {
        $user_email = $_POST['user_email'];
        $sql = "select * from users where user_email = :uemail";
        $statement = $con->prepare($sql);
        $statement->execute([
            ':uemail'=> $user_email
        ]);
        if($statement->rowCount() > 0) {
            echo 'false';    
        }
        else {
            echo 'true';
        }
    }