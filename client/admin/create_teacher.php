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

            <div class="form-group">
                <input class="form-control" type="email" placeholder="Enter Email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <input class="form-control" type="number" placeholder="Enter Phone Number" name="phone_no" id="phone_no" required>
            </div>

            <div id="error-msg"></div>
            <div class="modal-footer">
                <button id="submit" data-dismiss="modal" class="btn btn-dark-green submit-modify mr-1">Create</button>
                <a class="btn btn-blue submit-modify ml-1" href="school_year/sy_home.php" role="button">Cancel</a>
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
            Teacher Account Successfully Created.
        </div> 
    </div>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">

     

        $('.datepicker').datepicker({
            inline: true
        });

        document.querySelector("#submit").addEventListener("click", async (x) => {
            x.preventDefault();
            const school_id = <?php echo $_SESSION['school_id']; ?>;
            const firstname = document.querySelector("#firstname").value;
            const lastname = document.querySelector("#lastname").value;
            const middlename = document.querySelector("#middlename").value;
            const phone_no = document.querySelector("#phone_no").value;
            const email = document.querySelector("#email").value;

            try {
                let res = await axios.post('http://localhost/teachers-toolkit-app/server/api/user/create_teacher.php',{
                    school_id, firstname, lastname, middlename, phone_no, email
                });
                let data = res.data;
                if (res.data.result) {
                    document.querySelector("#firstname").value = '';
                    document.querySelector("#lastname").value = '';
                    document.querySelector("#middlename").value = '';
                    document.querySelector("#phone_no").value = '';
                    document.querySelector("#email").value = '';
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