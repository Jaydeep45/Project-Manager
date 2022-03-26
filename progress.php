<!DOCTYPE html>
<html>
    <head>
        <title>progress page</title>
        <link rel="stylesheet" href="progress_style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <script src="https://kit.fontawesome.com/8690d3ba80.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="Images/PMB.png">
    </head>
    <body>
        <div class="container-fluid">
            <!--PROJECT PROGESS PAGE-->
            <div class="row" id="row1"><!--FIRST ROW FOR PROJECT TITLE-->
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="ptitle"><!--project title-->
                        <h1>Project Title</h1>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row" id="row2"><!--SECOND ROW FOR DETAILED PROGESS FOR EACH TASK-->
                <div class="col-md-12">
                    <section class="progress-section">
                        <div class="container">
                            <div class="row" id="row2_1"><!--SUB ROW FOR TASK PROGRESS-->
                                <h1>Progress Of Each Task</h1><br><br>
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
                            <div class="row" id="row2_2"><!--SUB ROW FOR TASK NAME-->
                                <div class="col-md-3"><h3>HTML</h3></div>
                                <div class="col-md-3"><h3>CSS</h3></div>
                                <div class="col-md-3"><h3>PHP/JS</h3></div>
                                <div class="col-md-3"><h3>MySQL</h3></div>
                            </div>
                        </div>
                    </section>
                    
                </div>
            </div>
            <div class="row"><!--THIRD ROW FOR OTHER INFORMATION-->
                <div class="col-md-4">
                    <div class="taskadd" ><!--ADD TASK OR TEAM  -->
                        <h4>Task/Team</h4><br>
                        <input type="text" id="addt" placeholder="Task / Team"><br><br>
                        <input type="text" id="addt" placeholder="Task / Team"><br><br>
                        <input type="button" id="add" value="Add">
                    </div>
                </div>
                <div class="col-md-4"><!--SHOWING OVERALL PROGRESS OF THE PROJECT-->
                    <h2 id="overall_prog">OverAll Progress</h2>
                    <div class="circle-wrap">
                        <div class="circle">
                          <div class="mask full">
                            <div class="fill"></div>
                          </div>
                          <div class="mask half">
                            <div class="fill"></div>
                          </div>
                          <div class="inside-circle"> 75% </div>
                        </div>
                      </div> 
                </div>
                <div class="col-md-4">
                    <div class="add_del"><!--ADD OR DELETE FILES -->
                        <h4>Complete/Delete</h4><br>
                        <input type="text" id="taskno" placeholder="Task Number"><br><br>
                        <input type="button" id="upload" value="Upload File"><br><br>
                        <input type="button" id="delete" value="Delete File">
                    </div>
                </div>
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>