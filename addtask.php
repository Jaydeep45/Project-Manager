<?php
    include_once "connection.php";
    $con = Connection::connect();
    if(isset($_POST['assign'])) {
        $taskName = $_POST['task_name'];
        $userEmail = $_POST['assigned_email'];
        $projectName = $_POST['project_name'];
        $assignEmail = $_POST['assign_email'];
        $taskDesc = $_POST['task_desc'];
        $sql = "insert into assignment (assign_name, project_name, user_email, assign_email, task_desc) values (:aname, :pname, :uemail, :aemail, :tdesc)";
        $statement = $con->prepare($sql);
        $statement->execute([
            ':aname'=>$taskName,
            ':pname'=>$projectName,
            ':uemail'=>$userEmail,
            'aemail'=>$assignEmail,
            'tdesc'=>$taskDesc
        ]);
        header('location:project.php?project='.$projectName); 
        $_SESSION['taskUpdate'] = true;
    }
    ?>