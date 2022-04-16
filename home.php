<?php
    include_once "connection.php";
    $con = Connection::connect();
    session_start();
    if(isset($_SESSION['user_email'])) {
        $sql = "select * from users where user_email = :uemail";
        $user_email = $_SESSION['user_email'];
        $statement = $con->prepare($sql);
        $statement->execute([
            ':uemail'=> $user_email
        ]);
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        $skills = explode(" ", $data['user_skills']);
?>

<!DOCTYPE html>
    <head>
        <title>home page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- font awesone link -->
        <script src="https://kit.fontawesome.com/8690d3ba80.js" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- css stylesheet link -->
        <link rel="stylesheet" href="css/home_style.css">

        <link rel="icon" type="image/x-icon" href="Images/PMB.png">
    </head>
    <body>
        <!-- navigation bar -->
        <nav class="navbar navbar-custom">
            <div class="container-fluid">
                <!--all navbar elements-->
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <!-- find users option -->
                        <button type="button" class="btn btn-lg">
                            <a href="seeusers.php">See Users<span class="glyphicon glyphicon-user"></span></a>
                        </button>
                    </li>
                    <li>
                    <!-- see projects  -->
                    <button type="button" class="btn btn-lg">
                        <a href="seeprojects.php?id=<?php echo $data['id'] ?>">See Projects<span class="glyphicon glyphicon-folder-open"></span> </a>
                    </button>
                    </li>
                    <li>
                        <!-- notification alerts -->
                        <button type="button" class="btn btn-lg">
                            <a href="seetasks.php?email=<?php echo $data['user_email'] ?>">Notifications<span class="glyphicon glyphicon-bell"></span> </a>
                        </button>
                        </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <!-- log out -->
                        <button type="button" class="btn btn-lg">
                            <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
                        </button>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- main section of page -->
        <div class="main">
            <div class="container-fluid">
                <!-- main row -->
                <div class="row">
                    <div class="col-md-4"> 
                        <!-- user information on left side of page -->
                        <div class="user_info">
                            <!-- user icon -->
                        <div class="user_icon">
                            <i class="fa-solid fa-circle-user fa-6x"></i>
                        </div>
                        <form action="update.php?id=<?php echo $data['id'] ?>" method="POST">
                            <!-- form for user  -->
                            <div class="form-group">
                                <!-- user name with edit option -->
                                <div class="username">
                                    <input type="text" name="user_name" placeholder="User-Name" readonly  id="username" value="<?php echo $data['user_name'] ?>"/>
                                    <i class="fa-solid fa-square-pen fa-2x icon1"></i>
                                </div> 
                                <!-- email with edit option -->
                                <div class="email">
                                    <input type="email" name="user_email" placeholder="Email" readonly  id="email" value="<?php echo $data['user_email'] ?>">
                                    <i class="fa-solid fa-square-pen fa-2x icon2"></i>
                                </div>
                                <!-- mobile number with edit option -->
                                <div class="mobile">
                                    <input type="tel" name="user_mobile" placeholder="12-34-56-78-90" readonly  maxlength="10" id="mobile" value="<?php echo $data['user_mobile'] ?>">
                                    <i class="fa-solid fa-square-pen fa-2x icon3"></i>
                                </div>
                                <br>
                                <!-- option for team work or not -->
                                <h4>Would you like to work in a team?</h4>
                                <div class="team">
                                    <label class="checkbox-inline">
                                        <input type="radio" id="team" name="user_status" value="1" <?php if($data['user_status'] == 1) { echo "checked"; } ?>> Yes
                                    </label> 
                                    <label class="checkbox-inline">
                                        <input type="radio" id="noteam" name="user_status" value="0" <?php if($data['user_status'] == 0) { echo "checked"; } ?> > No 
                                    </label>
                                </div>
                                <br>
                                <!-- description of user  -->
                                <h4>Describe Yourself:</h4>
                                <div class="about">
                                    <textarea name="user_desc" id="about" cols="50" rows="2" placeholder="I am a software engineering......."><?php echo $data["user_desc"] ?></textarea>
                                </div>
                                <br>
                                <!--  user skills -->
                                <h4>Select Skills:</h4>
                                <div class="skills">
                                    <input type="checkbox" id="s1" name="skills[]" value="HTML" <?php if(in_array("HTML", $skills)) { echo "checked='checked'"; }?> >
                                    <label for="html">HTML</label><br>
                                    <input type="checkbox" id="css2" name="skills[]" value="CSS" <?php if(in_array("CSS", $skills)) { echo "checked='checked'"; }?> >
                                    <label for="css"> CSS</label><br>
                                    <input type="checkbox" id="bs" name="skills[]" value="BOOTSTRAP" <?php if(in_array("BOOTSTRAP", $skills)) { echo "checked='checked'"; }?> >
                                    <label for="bs"> BOOTSTRAP</label><br>
                                    <input type="checkbox" id="js" name="skills[]" value="JAVASCRIPT" <?php if(in_array("JAVASCRIPT", $skills)) {echo "checked='checked'"; } ?> >
                                    <label for="js"> JAVASCRIPT</label><br>
                                    <input type="checkbox" id="php" name="skills[]" value="PHP" <?php if(in_array("PHP", $skills)) {echo "checked='checked'"; } ?> >
                                    <label for="php"> PHP</label><br>
                                    <br>
                                </div>
                                <!-- submit button -->
                                <div class="submit">
                                    <input name="update" type="submit" id="submit">
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <!--  empty column for space managment -->
                    </div>
                    <div class="col-md-6">
                        <!--  project information --right side of page -->
                        <div class="project_info">
                        <h3 id="pt1">Start a new project</h3>
                        <form action="uploadproject.php?id=<?php echo $data['id']; ?>" method="POST">
                            <!-- project title -->
                            <div class="ptitle">
                                <label for="ptitle"><h4>Project Title:</h4></label><br>
                                <input name="project_name" type="text" id="ptitle" required>
                            </div>
                            <!-- project abstract -->
                            <div class="abstract">
                                <label for="abstract"><h4>Project Abstract:</h4></label><br>
                                <textarea name="project_abs" id="abstract" cols="30" rows="10" placeholder=" The project is about......" required></textarea>
                            </div>
                            <!-- technologies used in project -->
                            <div class="tech">
                                <label for="tech"><h4>Technologies used:</h4></label><br>
                                <textarea name="project_tech" id="tech" cols="30" rows="10" placeholder=" Tech used are......" required></textarea>
                            </div>
                            <!-- start button -->
                            <div class="start">
                                <input type="submit" name="upload" id="start" value="Start">
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- script for edit buttons -->
        <script>
            $(function () {
                $(".icon1").click(function () {
                    $("#username").removeAttr("readonly");
                });
                $(".icon2").click(function () {
                    $("#email").removeAttr("readonly");
                });
                $(".icon3").click(function () {
                    $("#mobile").removeAttr("readonly");
                });
            });
        </script> 
    </body>
</html>

<?php 
    }
    else {
        header('location:index.php');
    }
?>