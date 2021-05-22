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
                    <!-- data -->
                </select>
                <label class="mdb-main-label">Select Section</label>
            </div>
            
            <div class="form-group">
                <select class="mdb-select md-form colorful-select dropdown-primary" searchable="Search Subject.." id="subject">
                    <!-- data -->
                </select>
                <label class="mdb-main-label">Select Subject</label>
            </div>
            
            <div class="form-group">
                <select class="mdb-select md-form colorful-select dropdown-primary" searchable="Search Teacher.." id="teacher">
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
            Subject Successfully Assigned to Section.
        </div> 
    </div>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
        const school_id = <?php echo $_SESSION['school_id']; ?>;
        
        // get sy_id from query params
        const urlParams = new URLSearchParams(window.location.search);
        const sy_id = urlParams.get('sy_id');
        console.log('sy_id :>> ', sy_id);


        // set teachers
        axios.get(`http://localhost/teachers-toolkit-app/server/api/teacher/read.php?school_id=${school_id}`)
            .then(res => {
                if (res.data.result == 0) {
                    return;
                }
                let teachers = res.data.data;
                console.log('teachers ', teachers);
                const select = document.querySelector("#teacher");
                for(teach of teachers) {
                    select.options[select.options.length] = new Option(teach.firstname+' '+teach.lastname, teach.id); 
                }

            })
            .catch(err => console.log(err));

        // set subjects
        axios.get(`http://localhost/teachers-toolkit-app/server/api/subject/read.php?school_year_id=${sy_id}`)
            .then(res => {
                let subjects = res.data.data;
                console.log('subjects', subjects);
                const select = document.querySelector("#subject");
                for(sub of subjects) {
                    select.options[select.options.length] = new Option(sub.subject_name, sub.id); 
                }
            })
            .catch(err => console.log(err));

            
        // set sections
        axios.get(`http://localhost/teachers-toolkit-app/server/api/section/read.php?school_year_id=${sy_id}`)
            .then(res => {
                let sections = res.data.data;
                console.log('sections', sections);
                const select = document.querySelector("#section");
                for(sec of sections) {
                    select.options[select.options.length] = new Option(sec.section_name, sec.id); 
                }
            })
            .catch(err => console.log(err));

        const submit = document.querySelector("#submit");
        submit.addEventListener("click", (x) => {
            x.preventDefault();
            const section = document.querySelector("#section");
            const subject = document.querySelector("#subject");
            const teacher = document.querySelector("#teacher");
            const errorDiv = document.querySelector("#error-msg");

            if ( section.value == '' || subject.value == '' || teacher.value == '') {
                errorDiv.innerHTML = "Please complete form";
                return;
            }

            axios.post('http://localhost/teachers-toolkit-app/server/api/subject_assignment/create.php',
                {
                    'section_id': section.value,
                    'subject_id': subject.value,
                    'teacher_id': teacher.value 
                })
                .then(res => {
                    console.log(res.data);
                    if (res.data.result) {
                        errorDiv.innerHTML = "";
                        var option = {
                            animation: true,
                            delay: 3500
                        };   
                        var toastHTMLElement = document.getElementById("EpicToast");
                        var toastElement = new bootstrap.Toast(toastHTMLElement, option);
                        toastElement.show();
                    } else {
                        errorDiv.innerHTML = res.data.message;
                    }
                })
                .catch(err => console.log(err));

        });

    </script>
</body>
</html>