<?php

    include_once "connection.php";
    $con = Connection::connect();
    $id = $_GET['id'];
    echo $id;
    if(isset($_POST['upload'])) {
        $projectName = trim($_POST['project_name']);
        $projectAbs = trim($_POST['project_abs']);
        $projectTech = trim($_POST['project_tech']);
        $sql = "INSERT INTO projects (user_id, project_name, project_abs, project_tech) VALUES (:uid, :pname, :pabs, :ptech)";
        $statement = $con->prepare($sql);
        $statement->execute([
                ':uid'=>$id,
                ':pname'=> $projectName,
                ':pabs'=>$projectAbs,
                ':ptech'=>$projectTech,
        ]);
        mkdir("Upload/".$projectName);
        header('location:project.php?project='.$projectName);

    }