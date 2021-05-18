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
        .register-container{
            padding-top: 10%; 
            background-color: white;
            margin: 2% auto;
            width: 900px;
            border: 1px solid #ccc;
            border-radius: 4px;
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
        .radio_btns{
            text-align: center;
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
                        <input id="firstname" class="form-control" type="text" placeholder="Enter First Name" name="firstname" required>
                    </div>
                    <div class="col">
                        <input id="middlename" class="form-control" type="text" placeholder="Enter Middle Name" name="middlename" required>
                    </div>
                    <div class="col">
                        <input id="lastname" class="form-control" type="text" placeholder="Enter Last Name" name="lastname" required>
                    </div>
                </div>
            </div>
            <div class="form-group radio_btns">
                <div class="form-row">
                    <div class="col-8">
                        <input id="text" class="form-control" type="password" placeholder="Enter Graduate Course" name="grad_course" required>
                    </div>
                    <div class="col">
                        <label class="mb-0 ml-2" for="material-url">Gender: </label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="male" name="gender">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="female" name="gender">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="form-group">
                <input id="pnum" class="form-control" type="number" placeholder="Enter Phone Number" name="pnum" required>
            </div>
            <div class="form-group">
                <input id="password" class="form-control" type="password" placeholder="Enter Password" name="pword" required>
            </div>
            <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker" inline="true">
                <input placeholder="Select date" type="text" id="example" class="form-control">
                <label for="example">Enter Birthdate</label>
                <i class="fas fa-calendar input-prefix"></i>
            </div>
            <!--Account Type-->
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
                <button id="submit" data-dismiss="modal" class="btn btn-dark-green submit-modify">Register</button>
            </div>
        </div>
    </form>
        
    <script type="text/javascript">
        $('.datepicker').datepicker({
            inline: true
        });
    </script>
</body>
</html>