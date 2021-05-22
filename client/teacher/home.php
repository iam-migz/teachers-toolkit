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
        .view{
            height: 30px;
        }
        .align-self-end a {
            transform: translateY(-23px); 
        }
        .card{
            height: 89%;
        }
        .card-body{
            transform: translateY(-26px); 
        }
    </style>
</head>
<body>
    <?php include '../partials/header_teacher.php'; ?>

    <div class="container">
        <h2>University of San Carlos</h2>
        <p class="lead">Certified Advisor</p>
        <div class="row mt-4">
            <div class="col-lg-4 mt-1 box_card mb-4">
                <div class="card">
                    <div class="view overlay">
                        <img class="card-img-top" src="../images/work.jpg" alt="Card image cap">
                    </div>
                    <div class="align-self-end">
                        <a href="" class="btn-floating btn-action ml-auto red darken-1"><i class="fas fa-trash"></i></a>
                        <a href="view_subject.php" class="btn-floating btn-action ml-auto mr-4 teal darken-1"><i class="fas fa-book-open"></i></a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Introduction to Programming</h4>
                        <p class="card-text"><i class="far fa-clock"></i> Class Schedule: 9:00AM - 11:00AM</p>
                        <hr>
                        <p class="card-subtitle font-weight-normal" style="color: grey;"><i class="fas fa-archive"></i> Class Section: Tesla</p>
                        <div class="d-flex justify-content-between living-coral-text">
                            <p class="card-text font-small"><i class="fas fa-stamp"></i> 1st Semester S.Y 2021 - 2022</p>
                        </div>
                    </div>
                </div>
            </div> 
            
            <div class="col-lg-4 mt-1 box_card mb-4">
                <div class="card">
                    <div class="view overlay">
                        <img class="card-img-top" src="../images/work.jpg" alt="Card image cap">
                    </div>
                    <div class="align-self-end">
                        <a href="" class="btn-floating btn-action ml-auto red darken-1"><i class="fas fa-trash"></i></a>
                        <a href="view_subject.php" class="btn-floating btn-action ml-auto mr-4 teal darken-1"><i class="fas fa-book-open"></i></a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Information Management II</h4>
                        <p class="card-text"><i class="far fa-clock"></i> Class Schedule: 4:00PM - 6:30PM</p>
                        <hr>
                        <p class="card-subtitle font-weight-normal" style="color: grey;"><i class="fas fa-archive"></i> Class Section: Darwin</p>
                        <p class="card-text font-small"><i class="fas fa-stamp"></i> 1st Semester S.Y 2021 - 2022</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-1 box_card mb-4">
                <div class="card">
                    <div class="view overlay">
                        <img class="card-img-top" src="../images/work.jpg" alt="Card image cap">
                    </div>
                    <div class="align-self-end">
                        <a href="" class="btn-floating btn-action ml-auto red darken-1"><i class="fas fa-trash"></i></a>
                        <a href="view_subject.php" class="btn-floating btn-action ml-auto mr-4 teal darken-1"><i class="fas fa-book-open"></i></a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Marketing</h4>
                        <p class="card-text"><i class="far fa-clock"></i> Class Schedule: 1:00PM - 3:30PM</p>
                        <hr>
                        <p class="card-subtitle font-weight-normal" style="color: grey;"><i class="fas fa-archive"></i> Class Section: Hawking</p>
                        <p class="card-text font-small"><i class="fas fa-stamp"></i> 1st Semester S.Y 2021 - 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    </script>
</body>
</html>