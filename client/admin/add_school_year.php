<?php 
        session_start();
        if(isset($_SESSION['access']) && $_SESSION['access'] == 3){

        }else{
            header("location: http://localhost/teachers-toolkit-app/client/login/login.html");
        }
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


    </style>
</head>
<body>
    <!--Main Header-->
    <?php include '../partials/header_admin.php'; ?>
    
    <form>
        <div class="register-container">    
            <div class="register-title">
                <h1 class="display-4">Add School Year</h1>
            </div>
            <div class="md-form md-outline input-with-post-icon datepicker">
                <input placeholder="Select date" type="date" id="sy_start" class="form-control">
                <label for="example" class="text-muted" style="font-weight: 400">School Year Start</label>
            </div>

            <div class="md-form md-outline input-with-post-icon datepicker">
                <input placeholder="Select date" type="date" id="sy_end" class="form-control">
                <label for="example" class="text-muted" style="font-weight: 400">School Year End</label>
            </div>

            <div id="error-msg"></div>
            <div class="modal-footer">
                <button id="submit" data-dismiss="modal" class="btn btn-dark-green submit-modify">Create School Year</button>
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
            School Year Successfully Created.
        </div> 
    </div>
        
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">

        //Select
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });

        document.querySelector("#submit").addEventListener("click", async (x) => {
            x.preventDefault();

            let school_id;
            const sy_start = document.querySelector("#sy_start").value;
            const sy_end = document.querySelector("#sy_end").value;
            const errDiv = document.querySelector("#error-msg");

            if (sy_start == '' || sy_end == '') {
                errDiv.innerHTML = "Please Complete the form";
                return;
            } else if (sy_start > sy_end) {
                errDiv.innerHTML = "Please Correctly Input the dates";
                return;
            }

            try {
                let account_id = <?php echo $_SESSION['account_id']; ?>;
                let res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/admin/read_one.php?id=${account_id}`);
                let data = res.data;
                let school_id = data.school_id;

                res = await axios.post('http://localhost/teachers-toolkit-app/server/api/school_year/create.php',{
                    school_id, sy_start, sy_end
                });
                data = res.data;
                if (res.data.result) {
                    document.querySelector("#sy_start").value = '';
                    document.querySelector("#sy_end").value = '';
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