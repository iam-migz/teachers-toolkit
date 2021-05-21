<?php 
        session_start();
        if(isset($_SESSION['access']) && $_SESSION['access'] == 3){

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
    </style>
</head>
<body>
    <!--Main Header-->
    <?php include 'header.php'; ?>


    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-lg-4 mt-1 mr-5 box_card"> 
                <h2 class="text-center">Create Account</h2>
                <div class="card testimonial-card">
                    <div class="card-up purple-gradient lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/teacher.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Teacher</h4>
                        <hr>
                        <p><i class="fas fa-quote-left"></i> Who facilitates education for an individual may 
                        also be described as a personal tutor.</p>
                        <a type="button" href="../create_teacher.php" class="btn-floating light-green"><i class="far fa-hand-point-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mt-1 box_card">
                <h2 class="text-center">Create Account</h2>
                <div class="card testimonial-card">
                    <div class="card-up peach-gradient lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/student.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Student</h4>
                        <hr>
                        <p><i class="fas fa-quote-left"></i> Who attends a school, or who seeks knowledge from professional teachers or from books</p>
                        <a type="button" href="../create_student.php" class="btn-floating light-green"><i class="far fa-hand-point-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    </div>
    <!-- Card -->

    <script type="text/javascript">
    </script>
</body>
</html>