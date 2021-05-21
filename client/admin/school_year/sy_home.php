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
        <div class="row mt-4 mb-5 d-flex justify-content-center">
            <div class="col-lg-4 mt-4 mr-0 ml-0 box_card"> 
                <h2 class="text-center">Create Subject</h2>
                <div class="card testimonial-card">
                    <div class="card-up purple-gradient lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/subject.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Area of Learning</h4>
                        <hr>
                        <p><i class="fas fa-quote-left"></i> Refers to an area of knowledge that is studied in school 
                        that called a learning tool or the criteria by which we learn.</p>
                        <a type="button" href="create_subject.php" class="btn-floating light-green"><i class="far fa-hand-point-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mt-4 mr-0 ml-0 box_card">
                <h2 class="text-center">Create Section</h2>
                <div class="card testimonial-card">
                    <div class="card-up peach-gradient lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/section.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Individual Course Offering</h4>
                        <hr>
                        <p><i class="fas fa-quote-left"></i> Any of the more or less distinct parts into 
                        which something is or may be divided or from which it is made up.</p>
                        <a type="button" href="create_section.php" class="btn-floating light-green"><i class="far fa-hand-point-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mr-0 ml-0 box_card">
                <h2 class="text-center">Assign Subjects</h2>
                <div class="card testimonial-card">
                    <div class="card-up aqua-gradient lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/assign.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Designate Tasks</h4>
                        <hr>
                        <p><i class="fas fa-quote-left"></i> Assign a time for a job, you decide it will be done during that time. 
                        Appoint a post to make to teachers hold their roles.</p>
                        <a type="button" href="assign_subject.php" class="btn-floating light-green"><i class="far fa-hand-point-right" aria-hidden="true"></i></a>
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