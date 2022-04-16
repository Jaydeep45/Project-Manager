<?php
    include_once "connection.php";
    $con = Connection::connect();
    session_start();
    if(isset($_SESSION['user_email'])) {
        $projectName = $_GET["project"];
        $sql = "select * from projects where project_name = :project";
        $statement = $con->prepare($sql);
        $statement->execute([
            ':project'=> $projectName
        ]);
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        $sql2 = "select * from assignment where project_name = :project";
        $statement2 = $con->prepare($sql2);
        $statement2->execute([
            ':project'=> $projectName
        ]);
        $total = $statement2->rowCount();
        $sql3 = "select * from assignment where project_name = :project and status = 1";
        $statement3 = $con->prepare($sql3);
        $statement3->execute([
            ':project'=> $projectName
        ]);
        $completed = $statement3->rowCount(); 
        $progress = 0;
        if($total != 0) {
            $progress = ($completed/$total) * 100;
        }
?>
<!DOCTYPE html>
    <head>
        <title>Projects</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- css stylesheet -->
        <link rel="stylesheet" href="css/progress_style.css">
        <!-- font awesome link -->
        <script src="https://kit.fontawesome.com/8690d3ba80.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/x-icon" href="Images/PMB.png">
    
    </head>
    <body>
        <div class="container-fluid">
            <!--PROJECT PROGRESS PAGE-->
            <div class="row"><!--FIRST ROW FOR PROJECT TITLE-->
                <div class="col-md-2">
                    <!-- back button -->
                    <button type="button" class="btn btn-lg">
                        <a href="home.php"><span class="glyphicon glyphicon-arrow-left"></span> Home</a>
                    </button>
                </div>
                <div class="col-md-8">
                    <div class="ptitle"><!--project title-->
                        <h1><?php echo $data['project_name'];?> 
                        </h1>
                    </div>
                </div>
                <!-- empty column for space managment -->
                <div class="col-md-2"></div>
            </div>
            <div class="row" id="row2"><!--SECOND ROW FOR DETAILED PROGESS FOR EACH TASK-->
                <div class="col-md-12">
                    <section class="progress-section">
                        <div class="container">
                        <div class="row" id="row2_1"><!--SUB ROW FOR TASK PROGRESS-->
                                <h1>Project Details</h1>
                                <div class="col-md-3">
                                    <div class="progress-bars">
                                    <h2>85%</h2>
                                    </div><!--progress-bars 1-->
                                </div>
                                <div class="col-md-3">
                                    <div class="progress-bars-four">
                                    <h2>40%</h2>
                                    </div><!--progress-bars 2-->
                                </div>
                                <div class="col-md-3">
                                    <div class="progress-bars-six">
                                    <h2>65%</h2>
                                    </div><!--progress-bars 3-->
                                </div>
                                <div class="col-md-3">
                                    <div class="progress-bars-seven">
                                    <h2>70%</h2>
                                    </div><!--progress-bars 4-->
                                </div>
                        </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row"><!--THIRD ROW FOR OTHER INFORMATION-->
                <div class="col-md-4">
                    <div class="taskadd" ><!--ADD TASK OR TEAM  -->
                        <h4>Task/Team</h4><br>
                        <form action="addtask.php?project=<?php echo $projectName ?>" method="post">
                            <input type="text" name="task" id="addt" placeholder="Task Name"><br><br>
                            <input type="email" name="team" id="addt" placeholder="Teammate email"><br><br>
                            <input type="submit" name="Add" id="add" value="Add">
                        </form>
                    </div>
                </div>
                <div class="col-md-4"><!--SHOWING OVERALL PROGRESS OF THE PROJECT-->
                    <h2 id="overall_prog">OverAll Progress</h2>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress ?>%">
                            <?php echo $progress ?>%
                        </div>
                    </div>
                    <!-- download file button-->
                    <div class="download">
                        <a class="btn default-btn" href="download.php?project=<?php echo $projectName?>" id="download">Download</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="add_del"><!--ADD OR DELETE FILES -->
                        <h4>Complete/Delete</h4><br>
                        <form action="updatetask.php?project=<?php echo $projectName ?>" method="post" enctype="multipart/form-data">
                            <input type="text" name="task_name" id="taskno" placeholder="Task Name"><br><br>
                            <div class="upload">
                                <div class="upload-btn-wrapper">
                                    <button class="fbtn">Upload a file</button>
                                    <input type="file" name="project_file" />
                                </div>
                            </div>
                            <input type="submit" id="delete" name="upload" value="Completed">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php 
    }
    else {
        header('location:index.php');
    }
?>