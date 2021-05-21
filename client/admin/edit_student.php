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
        body{
            margin-bottom: 5%;
        }
        .register-container{
            padding-top: 10%; 
            background-color: white;
            margin: 2% auto;
            width: 66%;
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
            width: 48%;
            padding: 11px;
            border-radius: 10px;
        }
        #error-msg {
            color: red;
        }
        .radio_btns{
            text-align: center;
        }
    </style>
</head>
<body>
    <!--Main Header-->
    <?php include '../partials/header.php'; ?>
    
    <form>
        <div class="register-container">    
            <div class="register-title">
                <h1 class="display-4">Update Student</h1>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <input id="firstname" class="form-control" type="text" placeholder="Update First Name" name="firstname" required>
                    </div>
                    <div class="col">
                        <input id="middlename" class="form-control" type="text" placeholder="Update Middle Name" name="middlename" required>
                    </div>
                    <div class="col">
                        <input id="lastname" class="form-control" type="text" placeholder="Update Last Name" name="lastname" required>
                    </div>
                </div>
            </div>
            <div class="form-group radio_btns">
                <div class="form-row">
                    <div class="col-8">
                        <input id="email" class="form-control" type="text" placeholder="Update E-mail Address" name="email" required>
                    </div>
                    <div class="col">
                        <label class="mb-0 ml-2" for="material-url">Gender: </label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="male" name="gender" checked>
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
                <input id="LRN" class="form-control" type="number" placeholder="Update LRN" name="LRN" required>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <div class="md-form mt-0 md-0">
                            <input type="text" class="form-control" placeholder="Update City" id="city">
                        </div>
                    </div>

                    <div class="col">
                        <div class="md-form mt-0 md-0">
                            <input type="text" class="form-control" placeholder="Update Province" id="province">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form mt-0 md-0">
                            <input type="text" class="form-control" placeholder="Update Barangay" id="barangay">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="md-form md-outline input-with-post-icon datepicker mt-0">
                    <input placeholder="Select date" type="date" id="birthdate" class="form-control">
                    <label for="example" class="text-muted" style="font-weight: 400">Update Birthdate</label>
                </div>
            </div>
            
            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label>Continuing Status:</label>
                        <div class="switch">
                            <label class="text-center">
                                Status: 0
                                <input type="checkbox">
                                <span class="lever"></span> 
                                Status: 1
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <label>Completed Status:</label>
                        <div class="switch">
                            <label class="text-center">
                                Status: 0
                                <input type="checkbox">
                                <span class="lever"></span> 
                                Status: 1
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="error-msg"></div>
            <div class="modal-footer">
                <button id="submit" data-dismiss="modal" class="btn btn-dark-green submit-modify mr-1">Update</button>
                <a class="btn btn-blue submit-modify ml-1" href="viewTeachers_Students.php" role="button">Cancel</a>
            </div>
        </div>
    </form>

    <!-- TOAST -->
    <div class="toast" id="EpicToast" role="alert" aria-live="assertive" aria-atomic="true" style="position:absolute; top: 80px; right: 40px;">
        <div class="toast-header">
            <strong class="mr-auto">Notification</strong>
            <small>Teachers Toolkit</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Student Account Successfully Updated.
        </div> 
    </div>
        
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">

    </script>
</body>
</html>