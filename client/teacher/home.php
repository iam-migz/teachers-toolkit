<?php 
        session_start();
        if(isset($_SESSION['access']) && $_SESSION['access'] == 2){

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
    <title>Document</title>
    <style>
        .container{
            margin-top: 4%;
        }
    </style>
</head>
<body>
    <?php include '../partials/header_teacher.php'; ?>

    <div class="container">
        <h2>School Year Lists</h2>
        <p class="lead">Records</p>
        <div class="row mt-4" id="sy_list">
            <div class="col-md-6 mt-1 mb-4 box_card"> 
                <div class="card">
                    <div class="card-image" style="background-image: url('../images/school_year.png'); background-repeat: no-repeat; background-size: cover;">
                        <a href="subject_lists.php">
                            <div class="text-white d-flex h-100 mask aqua-gradient-rgba">
                                <div class="first-content align p-3">
                                    <h3 class="card-title" style="font-weight: 400">Academic Year</h3>
                                    <p class="lead mb-0">August 2020 - June 2021</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr>

    </div>

    <script>
    </script>
</body>
</html>