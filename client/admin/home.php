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
        .container{
            margin-top: 4%;
        }
        .btn_proceed{
            width: 97%;
        }
    </style>
</head>
<body>
    <?php include '../partials/header.php'; ?>
    
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-5">
                <!--Card Narrow-->
                <div class="card card-cascade narrower">
                    <div class="view view-cascade overlay">
                        <img class="card-img-top" src="../images/school.jpg" alt="Card image cap">
                        <a><div class="mask rgba-white-slight"></div></a>
                    </div>
                    <div class="card-body card-body-cascade">
                        <h4 class="font-weight-bold card-title">Edit School Info</h4>
                        <p class="card-text">Administrators of schools and districts can conveniently 
                            edit their school or district profiles using the Admin Portal.</p>
                        <a class="btn btn-dark-green btn_proceed">Proceed</a>
                    </div>
                </div>
                <!--Card Narrow End-->
            </div>
            <div class="col mb-5">
                <!--Card Narrow-->
                <div class="card card-cascade narrower">
                    <div class="view view-cascade overlay">
                        <img class="card-img-top" src="../images/school2.jpg" alt="Card image cap">
                        <a><div class="mask rgba-white-slight"></div></a>
                    </div>
                    <div class="card-body card-body-cascade">
                        <h4 class="font-weight-bold card-title">Add School Year</h4>
                        <p class="card-text">Adding days would be ineffective, and adding hours would be even more so. A systematic rethinking 
                            of our school year philosophy could be beneficial.</p>
                        <a class="btn btn-dark-green btn_proceed">Proceed</a>
                    </div>
                </div>
                <!--Card Narrow End-->
            </div>
        </div>
    </div>

</body>
</html>