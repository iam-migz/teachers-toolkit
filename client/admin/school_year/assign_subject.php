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
            width: 48%;
            padding: 11px;
            border-radius: 10px;
        }
        #error-msg {
            color: red;
        }
    </style>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    const school_id = <?php echo $_SESSION['school_id']; ?>;

    // set teachers
    axios.get(`http://localhost/teachers-toolkit-app/server/api/teacher/read.php?school_id=${school_id}`)
        .then(res => {
            if (res.data.result == 0) {
                return;
            }
            let teachers = res.data.data;
            console.log(teachers);
            const select = document.querySelector("#teacher");
            for(teach of teachers) {
                select.options[select.options.length] = new Option(teach.firstname+' '+teach.lastname, teach.id); 
            }

        })
        .catch(err => console.log(err));

    // set sections
    // axios.get(`http://localhost/teachers-toolkit-app/server/api/teacher/read.php?school_id=${school_id}`)
    //     .then(res => {
    //         if (res.data.result == 0) {
    //             return;
    //         }
    //         let teachers = res.data.data;
    //         console.log(teachers);
    //         const select = document.querySelector("#teacher");
    //         for(teach of teachers) {
    //             select.options[select.options.length] = new Option(teach.firstname+' '+teach.lastname, teach.id); 
    //         }

    //     })
    //     .catch(err => console.log(err));
</script>
</head>
<body>
    <!--Main Header-->
    <?php include 'header.php'; ?>

    <form>
        <div class="register-container">    
            <div class="register-title">
                <h1 class="display-4">Assign Subject</h1>
            </div>

            <div class="form-group">
                <select class="mdb-select md-form colorful-select dropdown-primary" searchable="Search Section.." id="section">
                    <option value="Section Class" selected disabled>Section Class</option>
                    <!-- data -->
                </select>
                <label class="mdb-main-label">Select Section</label>
            </div>
            
            <div class="form-group">
                <select class="mdb-select md-form colorful-select dropdown-primary" searchable="Search Subject.." id="subject">
                    <option value="School Subject" selected disabled>School Subject</option>
                    <!-- data -->
                </select>
                <label class="mdb-main-label">Select Subject</label>
            </div>
            
            <div class="form-group">
                <select class="mdb-select md-form colorful-select dropdown-primary" searchable="Search Teacher.." id="teacher">
                    <option value="Subject Teacher" selected disabled>Subject Teacher</option>
                    <!-- data -->
                </select>
                <label class="mdb-main-label">Select Teacher</label>
            </div>

            <div id="error-msg"></div>
            <div class="modal-footer">
                <button id="submit" data-dismiss="modal" class="btn btn-dark-green submit-modify">Assign</button>
                <a class="btn btn-blue submit-modify ml-1" href="../school_year/sy_home.php" role="button">Cancel</a>
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
            Subject Successfully Assigned.
        </div> 
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });

    </script>
</body>
</html>