<?php
    session_start();
    if(isset($_SESSION['user_email'])) {
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" href="home_style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <script src="https://kit.fontawesome.com/8690d3ba80.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="Images/PMB.png">
    </head>
    <body>
        <!-- MAIN CONTAINER OF THE PAGE -->
        <div class="container-fluid"> 
            <!-- mian row with three columns  -->
            <div class="row"> 
                <!-- first column -->
                <div class="col-md-4">
                    <!-- division for user information -->
                    <div class="uinfo"> 
                        <div class="user_icon"> <!--user icon -->
                            <i class="fa-solid fa-circle-user fa-6x"></i>&nbsp;
                        </div>
                        <br>
                        <!-- user name -->
                        <input type="text" id="name" placeholder="User-Name"><i class="fa-solid fa-square-pen fa-2x"></i>
                        <br><br>
                        <!-- email -->
                        <input type="email" id="email" placeholder="Email"><i class="fa-solid fa-square-pen fa-2x"></i>
                        <br><br>
                        <!-- mobile number -->
                        <input type="tel" id="mobile" placeholder="12-34-56-78-90" maxlength="12" required><i class="fa-solid fa-square-pen fa-2x"></i>
                        <br>
                        <!-- form tag for taking user choices -->
                        <form action="">
                            <br>
                            <h4> Would you like to work in a team ?</h4>
                            <!-- radio button for willingness to work in team or not -->
                            <input type="radio" id="team" name="team" value="team">
                            <label for="team"> Yes </label> &emsp;&emsp;&emsp;
                            <input type="radio" id="noteam" name="team" value="noteam">
                            <label for="noteam"> No </label>
                            <br><br>
                            <!-- user description -->
                            <label for="about"><h4> Describe Yourself :-</h4></label>
                            <br>
                            <textarea name="about" id="about" cols="50" rows="2" placeholder="I am a software engineering....."></textarea>
                            <br><br>
                            <!-- skills of user  -->
                            <h4> Select Skills :- </h4>
                            <input type="checkbox" id="s1" name="s1">
                            <label for="html">HTML</label><br>
                            <input type="checkbox" id="css2" name="css">
                            <label for="css"> CSS</label><br>
                            <input type="checkbox" id="bs" name="bs">
                            <label for="bs"> BOOTSTRAP</label><br>
                            <input type="checkbox" id="js" name="js">
                            <label for="js"> JAVA SCRIPT</label><br>
                            <input type="checkbox" id="php" name="php">
                            <label for="php"> PHP</label><br>
                            <br>
                            <!-- submit button -->
                            <input type="submit" id="submit">
                        </form>
                    </div>
                </div>
                <div class="col-md-2">
                <!-- empty column for space maintenance -->
                </div>
                <div class="col-md-6">  <!--third column for project information-->
                    <!-- division for project information -->
                    <div class="pinfo">
                        <h3 id="pt1">Start a new project</h3> 
                        <br>
                        <form action="">
                            <!-- project title -->
                            <label for="ptitle"><h4> Add Project title :-</h4></label>
                            <br>
                            <input type="text" id="ptitle">
                            <br><br>
                            <!-- project abstract -->
                            <label for="abstract"><h4> Project Abstract :-</h4></label>
                            <br>
                            <textarea name="abstract" id="abstract" cols="60" rows="4" placeholder="   the project is about....."></textarea>
                            <br><br>
                            <!-- technologies used in project -->
                            <label for="tech"><h4> Technologies used :-</h4></label>
                            <br>
                            <textarea name="tech" id="tech" cols="60" rows="4" placeholder="   tech used are..... "></textarea>
                            <br><br>
                            <!-- select files option -->
                            <div class="upload-btn-wrapper">
                                <button class="fbtn">Upload a file</button>
                                <input type="file" name="myfile" />
                            </div>
                            <!-- upload button -->
                            <label for="upload"></label>
                            <br><br>
                            <input type="button" id="upload" value="Start">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
<?php 
    }
    else {
        header('location:index.php');
    }
?>