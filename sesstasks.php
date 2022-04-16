<?php 
    if(isset($_SESSION('user_email'))) {
        header('location:index.php');
    $id = $_GET['id'];
    include_once "connection.php";
    $con = Connection::connect();
    $sql = "select * from projects where user_id = :uid";
    $statement = $con->prepare($sql);
    $statement->execute([
        ":uid"=>$id,
    ]);
    $data = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="Images/PMB.png">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    
    <link rel="stylesheet" href="css/seeprojects.css">
    <script src="https://kit.fontawesome.com/8690d3ba80.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <a class="back" href="home.php">Back</a>
        <h2 class="text-center">Projects</h2>
        <table id="user-projects" class="table table-striped">
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Project Abstract</th>
                    <th>Project Tech</th>
                    <th>View Project</th>
                    <th>Dowload Project</th>
                </tr>
            </thead>
            <tbody>
                    <?php 
                        foreach($data as $d) {
                        echo "<tr><td>".$d['project_name']."</td><td>".$d['project_abs']."</td><td>".$d['project_tech']."</td><td></td><td></td></tr>";
                        }
                    ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $("#user-projects").DataTable({
                "columnDefs": [
            {
                "targets": 3,
                "visible": true,
                "render": function ( data, type, row, meta ) {
                    return '<a class="btn btn-sm btn-warning" href="project.php?project=' + row[0]+'">View</a>';
                }
            }, 
            {
                "targets": 4,
                "visible": true,
                    "render": function ( data, type, row, meta ) {
                    return '<a class="btn btn-sm btn-primary" href="download.php?project=' + row[0]+'">Download</a>';
                }
            } ]

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