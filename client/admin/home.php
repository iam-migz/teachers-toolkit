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
    <!-- MDBootstrap Cards Extended Pro  -->
    <link href="../mdb/css/addons-pro/cards-extended.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .container{
            margin-top: 4%;
        }
        .btn_proceed{
            width: 97%;
        }
        .box_card{
            margin-bottom: 2%;
        }
    </style>
</head>
<body>
    <?php include '../partials/header.php'; ?>
    
    <div class="container">
        <h2>Account Catalog</h2>
        <div class="row mt-4">
            <div class="col-lg-4 mt-1 box_card"> 
                <div class="card card-cascade wider">
                    <div class="view view-cascade gradient-card-header blue-gradient">
                        <h2 class="card-header-title text-center">Account Management</h2>
                        <p class="mb-0"><i class="fas fa-user-check mr-2"></i>Teachers and Students</p>
                    </div>
                    <div class="card-body card-body-cascade text-center">
                        <a href="viewTeachers_Students.php" class="blue-text d-flex flex-row-reverse p-2">
                            <h5 class="waves-effect waves-light">View<i class="fas fa-angle-double-right ml-2"></i></h5>
                        </a>
                    </div>
                </div>
            </div> 
        </div>
        <hr>
        <h2>School Year Lists</h2>
        <div class="row mt-4">
            <div class="col-md-6 mb-4"> 
                <div class="card">
                    <div class="card-image" style="background-image: url(../images/school_year.png); background-repeat: no-repeat; background-size: cover;">
                        <a href="#">
                            <div class="text-white d-flex h-100 mask aqua-gradient-rgba">
                                <div class="first-content align p-3">
                                    <h3 class="card-title" style="font-weight: 400">Academic Year</h3>
                                    <p class="lead mb-0">August 2020 - May 2021</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div> 
            <div class="col-md-6 mb-4"> 
                <div class="card">
                    <div class="card-image" style="background-image: url(../images/school_year.png); background-repeat: no-repeat; background-size: cover;">
                        <a href="#">
                            <div class="text-white d-flex h-100 mask aqua-gradient-rgba">
                                <div class="first-content align p-3">
                                    <h3 class="card-title" style="font-weight: 400">Academic Year</h3>
                                    <p class="lead mb-0">August 2021 - May 2022</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>  
            <div class="col-md-6 mb-4"> 
                <div class="card">
                    <div class="card-image" style="background-image: url(../images/school_year.png); background-repeat: no-repeat; background-size: cover;">
                        <a href="#">
                            <div class="text-white d-flex h-100 mask aqua-gradient-rgba">
                                <div class="first-content align p-3">
                                    <h3 class="card-title" style="font-weight: 400">Academic Year</h3>
                                    <p class="lead mb-0">August 2022 - May 2023</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div> 
            <div class="col-md-6 mb-4"> 
                <div class="card">
                    <div class="card-image" style="background-image: url(../images/school_year.png); background-repeat: no-repeat; background-size: cover;">
                        <a href="#">
                            <div class="text-white d-flex h-100 mask aqua-gradient-rgba">
                                <div class="first-content align p-3">
                                    <h3 class="card-title" style="font-weight: 400">Academic Year</h3>
                                    <p class="lead mb-0">August 2023 - May 2024</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div> 
        </div>
        <hr>
        <h2>Administrative Tasks</h2>
        <div class="row mt-4">
            <div class="col-lg-4 mt-1 box_card"> 
                <!--Card Narrow-->
                <div class="card card-cascade narrower" style="max-width: 22rem;">
                    <div class="view view-cascade overlay">
                        <img class="card-img-top" src="../images/school.jpg" alt="Card image cap">
                        <a><div class="mask rgba-white-slight"></div></a>
                    </div>
                    <div class="card-body card-body-cascade">
                        <h4 class="font-weight-bold card-title">Edit School Info</h4>
                        <p class="card-text">Administrators of schools and districts can conveniently 
                            edit their school or district profiles using the Admin Portal.</p>
                        <a class="btn btn-dark-green btn_proceed" href="./edit_school.php">Proceed</a>
                    </div>
                </div>
                <!--Card Narrow End-->
            </div> 
            
            <div class="col-lg-4 mt-1 box_card">
                <!--Card Narrow-->
                <div class="card card-cascade narrower" style="max-width: 22rem;">
                    <div class="view view-cascade overlay">
                        <img class="card-img-top" src="../images/school2.jpg" alt="Card image cap">
                        <a><div class="mask rgba-white-slight"></div></a>
                    </div>
                    <div class="card-body card-body-cascade">
                        <h4 class="font-weight-bold card-title">Add School Year</h4>
                        <p class="card-text">Adding days or hours would be ineffective. It might be beneficial to rethink 
                            our school year philosophy in a systematic manner.</p>
                        <a class="btn btn-dark-green btn_proceed" href="./add_school_year.php">Proceed</a>
                    </div>
                </div>
                <!--Card Narrow End-->
            </div> 
        </div>
    </div>
        
</body>
</html>