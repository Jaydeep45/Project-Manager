<?php
    include_once "connection.php";
    $con = Connection::connect();
    $projectName = $_GET['project'];
    if(isset($_POST['Add'])) {
        $taskName = $_POST['task'];
        $userEmail = $_POST['team'];
        $sql = "insert into assignment (assign_name, project_name, user_email) values (:aname, :pname, :uemail)";
        $statement = $con->prepare($sql);
        $statement->execute([
            ':aname'=>$taskName,
            ':pname'=>$projectName,
            ':uemail'=>$userEmail
        ]);
        header('location:project.php?project='.$projectName); 
    }