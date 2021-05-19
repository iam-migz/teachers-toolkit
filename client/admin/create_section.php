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
                <h1 class="display-4">Create Section</h1>
            </div>
            <div class="form-group">
                <div class="md-form">
                    <input type="text" id="sec_name" name="sec_name" placeholder="Enter Section Name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                
                <div class="form-row">
                    <div class="col">
                        <select class="mdb-select md-form colorful-select dropdown-primary">
                            <option value="Academic Track" selected disabled>Academic Track</option>
                            <option value="Technical Vocational Livelihood (TVL) Track">Technical Vocational Livelihood (TVL) Track</option>
                            <option value="General Academic Strand (GAS)">General Academic Strand (GAS)</option>
                            <option value="Science, Technology, Engineering and Mathematics (STEM) Strand">Science, Technology, Engineering and Mathematics (STEM) Strand</option>
                            <option value="Accountancy, Business and Management (ABM) Strand">Accountancy, Business and Management (ABM) Strand</option>
                        </select>
                        <label class="mdb-main-label">Select Strand</label>
                        
                    </div>
                    <div class="col">
                        <select class="mdb-select md-form colorful-select dropdown-primary">
                            <option value="Grade Year" selected disabled>Grade Year</option>
                            <option value="Grade 11">11</option>
                            <option value="Grade 12">12</option>
                        </select>
                        <label class="mdb-main-label">Select Grade Year</label>
                    </div>
                </div>
            </div>

            <div id="error-msg"></div>
            <div class="modal-footer">
                <button id="submit" data-dismiss="modal" class="btn btn-dark-green submit-modify">Create Section</button>
            </div>
        </div>
    </form>
        
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        //Range
        $(document).ready(function() {
            const $valueSpan = $('.valueSpan2');
            const $value = $('#num_hours');
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
            const firstname = document.querySelector("#firstname").value;
            const lastname = document.querySelector("#lastname").value;
            const middlename = document.querySelector("#middlename").value;
            const phone_no = document.querySelector("#phone_no").value;
            const email = document.querySelector("#email").value;

            try {
                let res = await axios.post('http://localhost/teachers-toolkit-app/server/api/user/create_teacher.php',{
                    firstname, lastname, middlename, phone_no, email
                });
                let data = res.data;
                console.log(data);
            } catch (e) {
                console.log(e);
            }

        });
    </script>
</body>
</html>