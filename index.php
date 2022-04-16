<?php 
    session_start();
    if(isset($_SESSION['user_email'])) {
        header('location:home.php');
    }
    else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Images/PMB.png">
    <link rel="stylesheet" href="css/style.css">
    <title>Project Manager</title>
</head>

<body>
    <div class="bg container-fluid">

    <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark"  id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="Images/PMB.png" alt="Project Manager" width= "100" height= "95"></a>&emsp;
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contactus">Contact Us</a>
                            
                        </li>
                    </ul>
                    
                    <div class="mx-2" id="button">
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</button>
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
                    </div>
                </div>
            </div>
        </nav>
        <?php if(isset($_SESSION['error'])) { ?>
        <div class="text-center alert alert-danger error" role="alert">
            <?php 
                echo $_SESSION['error'];
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>
        <!--login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark text-light">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Log in to your account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" >
                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input name="user_email" type="email" class="form-control bg-dark text-light" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input name="user_psw" type="password" class="form-control bg-dark text-light"
                                    id="exampleInputPassword1">
                            </div>
                            <button type="submit" name="login" class="btn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Sign Up Modal -->
        <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark text-light">
                    <div class="modal-header">
                        <h5 class="modal-title" id="signupModalLabel">Create a new Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            ></button>
                    </div>
                    <div class="modal-body">
                        <form action="signup.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Name: </label>
                                <input name="user_name" type="text" class="form-control bg-dark text-light"
                                >
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Mobile Number: </label>
                                <input name="user_phone" type="tel" maxlength="12" pattern="[7-9]{1}[0-9]{9}" class="form-control bg-dark text-light" required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email: </label>
                                <input name="user_email" type="email" class="form-control bg-dark text-light" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password: </label>
                                <input name="user_psw" type="password" class="form-control bg-dark text-light"
                                    id="exampleInputPassword1">
                            </div>

                            <button type="submit" name="signup" class="btn">Create an account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- slidebar -->
        <div class="container">
            <div class="row">
                <div class="col col-md-5 slide1">
                    <h2>Manage your project with</h2>
                    <span>Task Assignment</span><br>
                    <span>Project Tracking</span><br>
                    <span>Add your team member whenever you need!</span>
                    <h1>Start Today!!!</h1>
                </div>

                <div class="col col-md-1"></div>

                <div class="col col-md-6" >
                    <section class="slide2">
                            <div class="row">
                                <div class="slide-carousel owl-carousel">
                                    <div class="single-box">
                                        <div class="content">
                                            <img src="Images/pexels-fauxels-3184291.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="single-box">
                                        <div class="content">
                                            <img src="Images/pexels-fauxels-3184292 (1).jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="single-box">
                                        <div class="content">
                                            <img src="Images/pexels-fox-1595385 (1).jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- features section -->
        <section class="testimonial" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="sec-heading text-center">
                        <h6>Features</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="clients-carousel owl-carousel">
                    <div class="single-box">
                        <div class="content">
                            <h4>Project Upload and Download</h4>
                            <p>"Project Members can Upload their respective parts of the project and download different parts 
                                of the project through this feature. They can keep tabs on the different amount of parts finished
                                and remaining of a project."
                            </p>
                        </div>
                    </div>
                    <div class="single-box">
                        <div class="content">
                            <h4>Find and Add Teammates</h4>
                            <p>"Project Leader and Managers will be able to find suitable developers and users, then
                                they will be able to add those developers who are willing to work alongside on the project 
                                with accordance to their skill set and project requirements."
                            </p>
                        </div>
                    </div>
                    <div class="single-box">
                        <div class="content">
                            <h4>Assigning Tasks</h4>
                            <p>" This feature allows the Project Leader to assign different tasks of a project to different members
                                of the group in acordance with their ability and skillset, tasks will be distributed evenly and 
                                in a equal manner of the project"
                            </p>
                        </div>
                    </div>
                    <div class="single-box">
                        <div class="content">
                            <span class="rating-star"><i class="icofont-star"></i><i class="icofont-star"></i><i
                                    class="icofont-star"></i><i class="icofont-star"></i><i
                                    class="icofont-star"></i></span>
                                    <h4>Notification Alerts</h4>
                                <p>"Automatic notifications will be sent to the users and project workers regarding the progress
                                    of the project, the deadlines, different aspects of the project, which parts
                                    are priority tasks and will send updates through E-MAIL and SMS"
                                </p>
                        </div>
                    </div>
                    <div class="single-box">
                        <div class="content">
                            <span class="rating-star"><i class="icofont-star"></i><i class="icofont-star"></i><i
                                    class="icofont-star"></i><i class="icofont-star"></i><i
                                    class="icofont-star"></i></span>
                                    <h4>Progress tracking</h4>
                                <p>"This feature will track the progress of the project and will provide a summary of what parts
                                    of the project are finished or remaining to the users. It will also track the all the progress of the 
                                    project with all the members simuoltaneously."
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <!-- Contact Us -->
        <div class="contactus" id="contactus">
        <div class="row">
            <div class="col" style="margin-left: 20px;text-align: center;">
                <span>Contact Us</span><br><br>
                <a href="#">
                    <h5>email@gmail.com</h5>
                </a>
                <a href="#">
                    <h5>+0-123-456-789</h5>
                </a>
                <a href="#">
                    <h5>@insta</h5>
                </a>
                <a href="#">
                    <h5>@twitter</h5>
                </a>
            </div>
            <div class="col" id="footer">
                <span>Write a message</span><br><br>
                <form action="#">
                    <input type="text" class="form-control" placeholder="Username"><br>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address"><br>
                    <textarea class="form-control" rows="5" id="comment" name="text" placeholder="Comments"></textarea><br>
                    <input type="submit" id="send" value="Submit">
                </form>
            </div>
        </div>
        </div>

    <!-- script link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js">
    </script>
    <script src="scrpit.js"></script>
</body>

</html>
<?php 
    }
?>