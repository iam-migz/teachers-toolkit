<?php 
        session_start();
        if(isset($_SESSION['access']) && $_SESSION['access'] == 2){

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
        .container{
            margin-top: 4%;
        }
        #school_name {
            text-transform: capitalize;
            font-style: italic;
        }
    </style>
</head>
<body>
    <?php include '../partials/header_teacher.php'; ?>

    <div class="container">
        <h2 id="school_name"></h2>
        <p class="lead mb-0">Teacher</p>
        <p class="lead" id="sy_div"></p>

        <div class="row mt-4" id="insert_to">

            <!-- <div class="col-lg-4 mt-1 box_card mb-4">
                <div class="card">
                    <div class="view overlay">
                        <img class="card-img-top" src="../images/work.jpg" alt="Card image cap">
                    </div>
                    <a href="view_subject.php" class="btn-floating btn-action ml-auto mr-4 teal darken-1"><i class="fas fa-book-open"></i></a>
                    <div class="card-body">
                        <h4 class="card-title mt-2">Introduction to Programming</h4>
                        <p class="card-text"><i class="far fa-clock"></i> Class Schedule: 9:00AM - 11:00AM</p>
                        <hr>
                        <p class="card-subtitle font-weight-normal" style="color: grey;"><i class="fas fa-archive"></i> Class Section: Tesla</p>
                        <p class="card-text font-small"><i class="fas fa-stamp"></i> 1st Semester S.Y 2021 - 2022</p>
                    </div>
                </div>
            </div>  -->
            
            <!-- <div class="col-lg-4 mt-1 box_card mb-4">
                <div class="card">
                    <div class="view overlay">
                        <img class="card-img-top" src="../images/work.jpg" alt="Card image cap">
                    </div>
                    <a href="view_subject.php" class="btn-floating btn-action ml-auto mr-4 teal darken-1"><i class="fas fa-book-open"></i></a>
                    <div class="card-body">
                        <h4 class="card-title mt-2">Information Management II</h4>
                        <p class="card-text"><i class="far fa-clock"></i> Class Schedule: 4:00PM - 6:30PM</p>
                        <hr>
                        <p class="card-subtitle font-weight-normal" style="color: grey;"><i class="fas fa-archive"></i> Class Section: Darwin</p>
                        <p class="card-text font-small"><i class="fas fa-stamp"></i> 1st Semester S.Y 2021 - 2022</p>
                    </div>
                </div>
            </div>  -->

            <!-- <div class="col-lg-4 mt-1 box_card mb-4">
                <div class="card">
                    <div class="view overlay">
                        <img class="card-img-top" src="../images/work.jpg" alt="Card image cap">
                    </div>
                    <a href="view_subject.php" class="btn-floating btn-action ml-auto mr-4 teal darken-1"><i class="fas fa-book-open"></i></a>
                    <div class="card-body">
                        <h4 class="card-title mt-2">Marketing</h4>
                        <p class="card-text"><i class="far fa-clock"></i> Class Schedule: 1:00PM - 3:30PM</p>
                        <hr>
                        <p class="card-subtitle font-weight-normal" style="color: grey;"><i class="fas fa-archive"></i> Class Section: Hawking</p>
                        <p class="card-text font-small"><i class="fas fa-stamp"></i> 1st Semester S.Y 2021 - 2022</p>
                    </div>
                </div>
            </div>  -->
        </div>
        <hr>
        <h2>Advisory Task</h2>
        <div class="row mt-4" id="insert_to">
            <div class="col-lg-12 mt-1 box_card mb-5">
                <div class="card">
                    <div class="card-image" style="background-image: url('../images/advisory.jpg'); background-repeat: no-repeat; background-size: cover;">
                        <a href="advisor_task.php">
                            <div class="text-white d-flex h-100 purple-gradient-rgba">
                                <div class="first-content align p-3">
                                    <h3 class="card-title" style="font-weight: 400">Consultative</h3>
                                    <p class="lead mb-0">This includes your students, generated report card and your advised subjects</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>

        const teacher_id = <?php echo $_SESSION['account_id']; ?>;
        const school_id = <?php echo $_SESSION['school_id']; ?>;

        // get sy_id from query params
        const urlParams = new URLSearchParams(window.location.search);
        const sy_id = urlParams.get('sy_id');
        console.log('sy_id :>> ', sy_id);
        
        if (sy_id == null || sy_id == '') {
            location.href = './home.php';
        }

        // set school year
        axios.get(`http://localhost/teachers-toolkit-app/server/api/school_year/read_one.php?id=${sy_id}`)
            .then(res => {
                const sy = res.data;
                const date_start = new Date(sy.sy_start);
                const date_end = new Date(sy.sy_end);

                const month_start = date_start.toLocaleString('default', { month: 'long' });
                const month_end = date_end.toLocaleString('default', { month: 'long' });

                const syDiv = document.querySelector("#sy_div");
                syDiv.innerHTML = `School Year: ${month_start} ${date_start.getFullYear()} - ${month_end} ${date_end.getFullYear()}`;
                // ${month_start} ${date_start.getFullYear()} - ${month_end} ${date_end.getFullYear()}
            })
            .catch(err => console.log(err));



        // set subjects
        axios.get(`http://localhost/teachers-toolkit-app/server/api/subject_assignment/read_teacher_subjects.php?school_year_id=${sy_id}&teacher_id=${teacher_id}`)
            .then(res => {
                if (res.data.result == 0 ){
                    return;
                }

                const subjects = res.data.data;
                console.log('subjects :>> ', subjects);
                const insert_to = document.querySelector("#insert_to");

                subjects.forEach(sub => {
                    const div = document.createElement('div');
                    div.classList.add('col-lg-4');
                    div.classList.add('mt-1');
                    div.classList.add('box_card');
                    div.classList.add('mb-4');
                    div.innerHTML = 
                    `
                    <div class="card">
                        <div class="view overlay">
                            <img class="card-img-top" src="../images/work.jpg" alt="Card image cap">
                        </div>
                        <a href="view_subject.php?subject_assignment_id=${sub.subject_assignment_id}&subject_id=${sub.subject_id}&section_id=${sub.section_id}" class="btn-floating btn-action ml-auto mr-4 teal darken-1"><i class="fas fa-book-open"></i></a>
                        <div class="card-body">
                            <h4 class="card-title mt-2">${sub.subject_name}</h4>
                            <div class="d-flex justify-content-between living-coral-text text-muted">
                                <p class="card-subtitle font-small"><i class="far fa-calendar-check"></i> Semester: ${sub.semester}</p>
                                <p class="card-subtitle font-small"><i class="far fa-clock"></i> Hours: ${sub.hours}</p>
                            </div>
                            <hr>
                            <p class="card-subtitle font-weight-normal" style="color: grey;"><i class="fas fa-archive"></i> Class Section: ${sub.section_name}</p>
                        </div>
                    </div>
                    `;
                    insert_to.appendChild(div);
                });
            
            })
            .catch(err => console.log(err));



        // set school
        axios.get(`http://localhost/teachers-toolkit-app/server/api/school/read_one.php?id=${school_id}`)
            .then(res => {
                const school = res.data;
                $('#school_name').html(school.school_name); 
                console.log('school :>> ', school);
            })
            .catch(err => console.log(err));

    </script>


</body>
</html>