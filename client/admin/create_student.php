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
    </style>
</head>
<body>
    <!--Main Header-->
    <?php include '../partials/header.php'; ?>
    
    <form>
        <div class="register-container">    
            <div class="register-title">
                <h1 class="display-4">Create Student</h1>
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
                        <input id="email" class="form-control" type="text" placeholder="Enter E-mail Address" name="email" required>
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
                <input id="LRN" class="form-control" type="number" placeholder="Enter LRN" name="LRN" required>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <div class="md-form mt-0">
                            <input type="text" class="form-control" placeholder="City" id="city">
                        </div>
                    </div>

                    <div class="col">
                        <div class="md-form mt-0">
                            <input type="text" class="form-control" placeholder="Province" id="province">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form mt-0">
                            <input type="text" class="form-control" placeholder="Barangay" id="barangay">
                        </div>
                    </div>
                </div>
            </div>
            <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                <input placeholder="DD/MM/YYYY" type="text" id="birthdate" class="form-control">
                <label for="example">Enter Birthdate</label>
                <i class="fas fa-calendar input-prefix" tabindex=0></i>
            </div>
            <div id="error-msg"></div>
            <div class="modal-footer">
                <button id="submit" data-dismiss="modal" class="btn btn-dark-green submit-modify">Register</button>
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
            Student Account Successfully Created.
        </div> 
    </div>
        
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        $('.datepicker').datepicker({
                dateFormat:"yy-mm-dd"
            });

        document.querySelector("#submit").addEventListener("click", async (x) => {
            x.preventDefault();
            const firstname = document.querySelector("#firstname").value;
            const lastname = document.querySelector("#lastname").value;
            const middlename = document.querySelector("#middlename").value;
            const email = document.querySelector("#email").value;
            const province = document.querySelector("#province").value;
            const city = document.querySelector("#city").value;
            const barangay = document.querySelector("#barangay").value;
            let gender;
            const LRN = document.querySelector("#LRN").value;
            const birthdate = document.querySelector("#birthdate").value;
            const male = document.querySelector("#male");
            const female = document.querySelector("#female");
            
            if (male.checked) {
                gender = 'm';
            } else if (female.checked) {
                gender = 'f';
            }
            try {
                console.log('birthdate :>> ', birthdate);

                return;
                let res = await axios.post('http://localhost/teachers-toolkit-app/server/api/user/create_student.php',{
                    firstname, lastname, middlename, email, province, city, barangay, gender, LRN, birthdate
                });
                let data = res.data;
                if (res.data.result) {
                    document.querySelector("#firstname").value = '';
                    document.querySelector("#lastname").value = '';
                    document.querySelector("#middlename").value = '';
                    document.querySelector("#email").value = '';
                    document.querySelector("#province").value = '';
                    document.querySelector("#city").value = '';
                    document.querySelector("#barangay").value = '';
                    document.querySelector("#LRN").value = '';
                    document.querySelector("#birthdate").value = '';
                    var option = {
                        animation: true,
                        delay: 3500
                    };   
                    var toastHTMLElement = document.getElementById("EpicToast");
                    var toastElement = new bootstrap.Toast(toastHTMLElement, option);
                    toastElement.show();

                }
                console.log(data);
            } catch (e) {
                console.log(e);
            }

        });
    </script>
</body>
</html>