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
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--  jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body, html{ min-height: 100%; }
        body{
            background-image: url(../images/sample.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            margin-bottom: 5%;
        }
        .title{
            margin: 50px auto;
            text-align: center;
        }
        .title img{
            width: 560px;
        }
        input[type=text], input[type=email], input[type=password], input[type=date]{
            width: 100%;
            padding: 10px 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            display: inline-block;
        }
        .register-container{
            padding-top: 10%; 
            background-color: white;
            margin: 2% auto;
            width: 900px;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px 20px;
        }
        .register-title{
            text-align: center;
            margin-bottom: 30px;
        }
        .display-4{
            font-size: 40px;
        }
        .submit-modify{
            font-size: 20px;
            width: 100%;
            padding: 11px;
            border-radius: 10px;
        }
        .return-login{
            font-size: 23px;
            margin: 0 auto;
            display: block;
            text-align: center;
        }
        #error-msg {
            color: red;
        }

        .flex-cont {
            margin-left: 20%;
            margin-right: 20%;
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            margin-bottom: 30px;
        }
        .acc-type{
            height: 300px;
            width: 47%;
            background: #d5d5d5;
            padding: 5px;
            border-radius: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .acc-type h4{
            text-align: center;
        }
        #message {
            color: grey;
            font-size: 0.9em;
        }
        .acc-selected {
            background: #4fccff;
            transform: scale(1.01);
            box-shadow: 1px 1px 1px grey; 
        }
    </style>
    <script type="text/javascript">
        $('.datepicker').datepicker({
            $('.datepicker').datepicker();
        });
    </script>
</head>
<body>
    <!--Main Header-->
    <?php include '../partials/header.php'; ?>
    
    <form>
        <div class="register-container">    
            <div class="register-title">
                <h1 class="display-4">Create Teacher</h1>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <!--<label for="fname">First Name:</label>-->
                        <input id="firstname" class="form-control" type="text" placeholder="Enter First Name" name="firstname" required>
                    </div>
                    <div class="col">
                        <!--<label for="mname">Middle Name:</label>-->
                        <input id="middlename" class="form-control" type="text" placeholder="Enter Middle Name" name="middlename" required>
                    </div>
                    <div class="col">
                        <!--<label for="lname">Last Name:</label>-->
                        <input id="lastname" class="form-control" type="text" placeholder="Enter Last Name" name="lastname" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-10">
                        <input id="text" class="form-control" type="password" placeholder="Enter Graduate Course" name="grad_course" required>
                    </div>
                    <div class="col">
                        <input id="gender" class="form-control" type="text" placeholder="M/F" name="gender" required>
                    </div>
                </div>  
            </div>
            <div class="form-group">
                <!--<label for="pword">Password:</label>-->
                <input id="pnum" class="form-control" type="number" placeholder="Enter Phone Number" name="pnum" required>
            </div>
            <div class="form-group">
                <!--<label for="pword">Password:</label>-->
                <input id="password" class="form-control" type="password" placeholder="Enter Password" name="pword" required>
            </div>
            <div class="md-form md-outline">
                <input type="date" id="example" class="form-control">
                <label for="example">Enter Birthday</label>
            </div>
            <h5 class="mt-3" style="text-align: center;">Account Type</h5>
            <div id="message" style="text-align: center;">
                you will automatically be assigned as subject teacher.<br>
                <b><i>Select your special role, click the role of your choice</i></b>
            </div>
            <div class="container">
                <div class="flex-cont">
                    <div class="acc-type" id="adv_yes">
                        <h4>Advisor</h4>
                        <img src="../images/advisor.jpg" alt="" style="height: 150px; width: 100%;">
                        <p class="unselectable">
                            Class advisors have access to the grade and attendance of the students and create report cards.
                        </p>
                    </div>
                    <div class="acc-type" id="adm_yes">
                        <h4>Admin</h4>
                        <img src="../images/admin.png" alt="" style="height: 150px; width: 100%;">
                        <p class="unselectable">
                            School administrator is in charge of registering the school 
                        </p>
                    </div>
                </div>
            </div>
            <div id="error-msg"></div>
            <div class="modal-footer">
                <button id="submit" data-dismiss="modal" class="btn btn-success submit-modify">Register</button>
            </div>
        </div>
    </form>
    
</body>
</html>