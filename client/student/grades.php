<?php 
        session_start();
        if(isset($_SESSION['access']) && $_SESSION['access'] == 1){

        }else{
            // header("location: ../login/login.html");
        }
        // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- MDBootstrap Cards Extended Pro  -->
    <link href="../mdb/css/addons-pro/cards-extended.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .container{
            margin-top: 4%;
        }
    </style>
</head>
<body>
    <?php include '../partials/header_student.php'; ?>

    <div class="container">
        <center>
        <h4>
        <b>SCIENCE, TECHNOLOGY, AND MATHEMATICS</b>
        </h4>
        <p class="lead">Section: Hawking</p>
        </center>
        <table class="table table-striped table-responsive-md">
            <thead class="font-weight-bold">
                <tr>
                    <th class="hidden-xs col-lg-1">Subject</th>
                    <th>First Quarter</th>
                    <th>Second Quarter</th>
                    <th>Final Grades</th>
                </tr>
            </thead>
            <tbody>

            </tbody>


        </table>        
        
    </div>

    <script>
    </script>
</body>
</html>