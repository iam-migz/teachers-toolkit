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
    </style>
</head>
<body>
    <!--Main Header-->
    <?php include 'header.php'; ?>


    <div class="container">
        <div class="row mt-4 mb-5 d-flex justify-content-center">
            <div class="col-lg-4 mt-4 mr-0 ml-0 box_card"> 
                <h2 class="text-center">Create Subject</h2>
                <div class="card testimonial-card">
                    <div class="card-up purple-gradient lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/subject.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Area of Learning</h4>
                        <hr>
                        <p><i class="fas fa-quote-left"></i> Refers to an area of knowledge that is studied in school 
                        that called a learning tool or the criteria by which we learn.</p>
                        <a type="button" id="create_subject" class="btn-floating light-green"><i class="far fa-hand-point-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mt-4 mr-0 ml-0 box_card">
                <h2 class="text-center">Create Section</h2>
                <div class="card testimonial-card">
                    <div class="card-up peach-gradient lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/section.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Individual Course Offering</h4>
                        <hr>
                        <p><i class="fas fa-quote-left"></i> Any of the more or less distinct parts into 
                        which something is or may be divided or from which it is made up.</p>
                        <a type="button" id="create_section" class="btn-floating light-green"><i class="far fa-hand-point-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mr-0 ml-0 box_card">
                <h2 class="text-center">Assign Subjects</h2>
                <div class="card testimonial-card">
                    <div class="card-up aqua-gradient lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/assign.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Designate Tasks</h4>
                        <hr>
                        <p><i class="fas fa-quote-left"></i> Assign a time for a job, you decide it will be done during that time. 
                        Appoint a post to make to teachers hold their roles.</p>
                        <a type="button" id="assign_subject" class="btn-floating light-green"><i class="far fa-hand-point-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5 mt-4 mr-0 ml-0 box_card">
                <h2 class="text-center">View Assigned Subjects</h2>
                <div class="card testimonial-card">
                    <div class="card-up aqua-gradient lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/view.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">View Designate Tasks</h4>
                        <hr>
                        <p><i class="fas fa-quote-left"></i> View a datatable to monitor assigned teachers in order to manage and organize advisors at the university.</p>
                        <a type="button" id="view_assigned_sub" class="btn-floating light-green"><i class="far fa-hand-point-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script type="text/javascript">

        // get sy_id from query params
        const urlParams = new URLSearchParams(window.location.search);
        const sy_id = urlParams.get('sy_id');
        console.log('sy_id :>> ', sy_id);
        
        if (sy_id == null || sy_id == '') {
            location.href = `../home.php`;
        }

        const create_section = document.querySelector("#create_section");
        const create_subject = document.querySelector("#create_subject");
        const assign_subject = document.querySelector("#assign_subject");
        const view_assigned_sub = document.querySelector("#view_assigned_sub");

        create_section.addEventListener("click", (x) => {
            x.preventDefault();
            location.href = `./create_section.php?sy_id=${sy_id}`;
        })
        create_subject.addEventListener("click", (x) => {
            x.preventDefault();
            location.href = `./create_subject.php?sy_id=${sy_id}`;
        })
        assign_subject.addEventListener("click", (x) => {
            x.preventDefault();
            location.href = `./assign_subject.php?sy_id=${sy_id}`;
        })

        view_assigned_sub.addEventListener("click", (x) => {
            x.preventDefault();
            location.href = `./view_assigned_sub.php?sy_id=${sy_id}`;
        })
</script>


</body>
</html>