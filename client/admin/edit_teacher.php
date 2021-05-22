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
    </style>
</head>
<body>
    <!--Main Header-->
    <?php include '../partials/header.php'; ?>
    
    <form>
        <div class="register-container">    

            <div class="register-title">
                <h1 class="display-4">Update Teacher</h1>
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

            <div class="form-group">
                <input class="form-control" type="email" placeholder="Update Email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <input class="form-control" type="number" placeholder="Update Phone Number" name="phone_no" id="phone_no" required>
            </div>
            
            <div class="form-group">
                <label class="">Continuing Status:</label>
                <div class="switch">
                    <label class="text-center">
                        <input type="checkbox" id="continuing">
                        <span class="lever"></span> 
                    </label>
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
            Teacher Account Successfully Updated.
        </div> 
    </div>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">

        const firstname = document.querySelector("#firstname");
        const middlename = document.querySelector("#middlename");
        const lastname = document.querySelector("#lastname");
        const email = document.querySelector("#email");
        const phone_no = document.querySelector("#phone_no");
        const continuing = document.querySelector("#continuing");


        // get teacher_id from query params
        const urlParams = new URLSearchParams(window.location.search);
        const teacher_id = urlParams.get('teacher_id');
        console.log('teacher_id :>> ', teacher_id);

        axios.get(`http://localhost/teachers-toolkit-app/server/api/teacher/read_one.php?id=${teacher_id}`)
            .then(res => {
                if (res.data.result == 0) {
                    return;
                }
                let teacher = res.data.data[0];
                console.log(teacher);
                firstname.value = teacher.firstname;
                middlename.value = teacher.middlename;
                lastname.value = teacher.lastname;
                email.value = teacher.email;
                phone_no.value = teacher.phone_no;
                continuing.checked = (teacher.continuing == '1') ? 1 : 0;

            })
            .catch(err => console.log(err));

        const errorDiv = document.querySelector("#error-msg");
        document.querySelector("#submit").addEventListener("click", (x) => {
            x.preventDefault();
            if (firstname.value == '' || middlename.value == '' || lastname.value == '' || email.value == '' || phone_no.value == ''){
                errorDiv.innerHTML = "please complete the form";
                return;
            }

            let continue_val = continuing.checked ? 1 : 0;
            axios.put('http://localhost/teachers-toolkit-app/server/api/teacher/update.php', {
                "id": teacher_id,
                "firstname": firstname.value,
                "lastname": lastname.value,
                "middlename": middlename.value,
                "phone_no": phone_no.value,
                "email": email.value,
                "continuing": continue_val
            })
            .then(res => {
                if (res.data.result) {
                    location.reload();
                } else {
                    errorDiv.innerHTML = res.data.message;
                }
            })
            .catch(err => console.log(err));

        });

    </script>
</body>
</html>