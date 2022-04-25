<?php

    include_once "connection.php";
    $con = Connection::connect();
    $projectName = $_GET['project'];
    if(isset($_POST['upload'])) {
        $taskName = $_POST['task_name'];
        $file = $_FILES['project_file'];
        $fileTemp = $file['tmp_name'];
        $file = $_FILES['project_file'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTemp = $file['tmp_name'];
        $fileType = $file['type'];
        $sql = "update assignment set status = 1 where assign_name = :tname";
        $stmt = $con->prepare($sql);
        $stmt->execute([
            'tname'=>$taskName
        ]);
        move_uploaded_file($fileTemp, "Upload/".$projectName."/".$fileName);
        header('location:project.php?project='.$projectName);
    }
