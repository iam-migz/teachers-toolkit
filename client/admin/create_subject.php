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
            width: 66%;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px 20px;
        }
        .register-title{
            text-align: center;
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
                <h1 class="display-4">Create Subject</h1>
            </div>
            <div class="form-group">
                <div class="md-form">
                    <input type="text" id="subject_name" name="subject_name" placeholder="Enter Subject Name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <select class="mdb-select md-form colorful-select dropdown-primary" id="semester">
                    <option value="Course Semester" selected disabled>Course Semester</option>
                    <option value="1st Semester">1st Semester</option>
                    <option value="2nd Semester">2nd Semester</option>
                </select>
                <label class="mdb-main-label">Select Semester</label>
            </div>

            <div class="form-group">
                <label for="">Number of Hours:</label>
                <div class="d-flex justify-content-center">
                    <div class="w-75">
                        <input type="range" class="custom-range" id="hours" min="1" max="80">
                    </div>
                    <span class="font-weight-bold text-primary ml-2 valueSpan2"></span>
                </div>
            </div>

            <div id="error-msg"></div>
            <div class="modal-footer">
                <button id="submit" data-dismiss="modal" class="btn btn-dark-green submit-modify">Create Subject</button>
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
            Subject Successfully Created.
        </div> 
    </div>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        //Range
        $(document).ready(function() {
            const $valueSpan = $('.valueSpan2');
            const $value = $('#hours');
            $valueSpan.html($value.val());
            $value.on('input change', () => {
                $valueSpan.html($value.val());
            });
        });
        
        //Select
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
        


        document.querySelector("#submit").addEventListener("click", async (x) => {
            x.preventDefault();
            const subject_name = document.querySelector("#subject_name").value;
            const semester = document.querySelector("#semester").value;
            const hours = document.querySelector("#hours").value;
            const errDiv = document.querySelector("#error-msg");

            if (subject_name == '' || semester == '' || hours == '') {
                errDiv.innerHTML = "Please Complete the form";
                return;
            }
            try {
                let res = await axios.post('http://localhost/teachers-toolkit-app/server/api/subject/create.php',{
                    subject_name, semester, hours
                });
                let data = res.data;
                if (res.data.result) {
                    document.querySelector("#subject_name").value = '';
                    document.querySelector("#hours").value = '';
                    errDiv.innerHTML = "";
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