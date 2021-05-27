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
    <!-- MDBootstrap Datatables  -->
    <link href="../mdb/css/addons/datatables.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .container{
            background-color: white;
            margin-top: 4%;
        }
        .btn_proceed{
            width: 97%;
        }
        .table{
            transform: scale(0.95);
        }
        #subject_name {
            text-transform: capitalize;
            font-style: italic;
        }
    </style>
</head>
<body>
    <?php include '../partials/header_teacher.php'; ?>

    <h3 class="text-center mt-4 mb-0">
        <span id="subject_name"></span>
        <a type="button" href="subject_lists.php" class="btn-floating blue">
            <i class="far fa-hand-point-left" aria-hidden="true"></i>
        </a>
    </h3>
    <div class="container mt-4">
        <ul class="nav md-pills nav-justified pills-success-color-dark mb-4">
            <li class="nav-item pl-0">
                <a class="nav-link active " data-toggle="tab" href="#add_stud" role="tab">
                <i class="fas fa-user-graduate mr-2 fa-lg"></i>
                
                Your Students</a>
            </li>
            <li class="nav-item pl-0">
                <a class="nav-link" data-toggle="tab" href="#view_grades" role="tab">
                <i class="fas fa-star mr-2 fa-lg"></i>
                Grades</a>
            </li>
            <!-- <li class="nav-item pl-0">
                <a class="nav-link" data-toggle="tab" href="#attendance" role="tab">
                <i class="fas fa-calendar-check mr-2 fa-lg"></i>
                Attendance</a>
            </li> -->
            <li class="nav-item pl-0">
                <a class="nav-link" data-toggle="tab" href="#report_events" role="tab">
                <i class="fas fa-star mr-2 fa-lg"></i>
                Report Events</a>
            </li>
        </ul>
        <div class="tab-content mb-4">
            <!--Panel Add Student-->
            <div class="tab-pane fade in show active" id="add_stud" role="tabpanel">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg mt-0">
                    <table id="add_stud_table" class="table table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Student ID</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">LRN</th>
                                <th class="th-sm">Email Address</th>
                                <th class="th-sm">Address</th>
                                <th class="th-sm">Gender</th>
                            </tr>
                        </thead>
                        <tbody id="insert_to">
                            <!-- <tr>
                                <td>1927</td>
                                <td>Hill, Grace</td>
                                <td>19273</td>
                                <td>grace@gmail.com</td>
                                <td>barangay, province, city</td>
                                <td>F</td>
                            </tr>
                            <tr>
                                <td>1927</td>
                                <td>Hill, Grace</td>
                                <td>19273</td>
                                <td>grace@gmail.com</td>
                                <td>barangay, province, city</td>
                                <td>F</td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Panel View Grades-->
            <div class="tab-pane fade" id="view_grades" role="tabpanel">
                <div class="row mt-0 mb-0 d-flex justify-content-center">

                    <div class="col-lg-5 mt-2 mb-3 mr-4 box_card"> 
                        <div class="card indigo lighten-3">
                            <div class="card-body pb-0">
                                <h2 class="card-title font-weight-bold">
                                    <i class="fas fa-graduation-cap pl-5 fa-2x"></i>
                                    First Quarter
                                </h2>
                                <div class="d-flex justify-content-between">
                                    <p class="card-subtitle font-weight-normal">1st Semester</p>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body pt-0 align-self-end">
                            <a href="#" onclick="linkTo(1, event)" role="button" class="btn btn-rounded btn-block btn-mdb-color darken-2">
                                <i class="fas fa-search pr-1" aria-hidden="true"></i>
                                Review
                            </a>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-5 mt-2 mb-3 ml-4 box_card">
                        <div class="card indigo lighten-3">
                            <div class="card-body pb-0">
                                <h2 class="card-title font-weight-bold">
                                    <i class="fas fa-graduation-cap pl-5 fa-2x"></i>
                                    Second Quarter
                                </h2>
                                <div class="d-flex justify-content-between">
                                    <p class="card-subtitle font-weight-normal">2nd Semester</p>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body pt-0 align-self-end">
                            <a href="#" onclick="linkTo(2, event)" role="button" class="btn btn-rounded btn-block btn-mdb-color darken-2">
                                <i class="fas fa-search pr-1" aria-hidden="true"></i>
                                Review
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Panel Attendance-->
            <!-- <div class="tab-pane fade" id="attendance" role="tabpanel">
                <div class="jumbotron card card-image" style="background-image: url(../images/forgot-bg.jpg);">
                    <div class="text-white text-center py-3 px-2 pb-0">
                        <div>
                            <h2 class="card-title h1-responsive pt-3 mb-5 font-bold"><strong>Attendance at the meeting is mandatory.</strong></h2>
                            <a href="stud_attend.php"class="btn btn-outline-white btn-rounded btn-lg"><i class="far fa-edit left"></i> Review Attendance Rate</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="tab-pane fade" id="report_events" role="tabpanel">
                <div class="jumbotron card card-image" style="background-image: url(../images/forgot-bg.jpg);">
                    <div class="text-white text-center py-3 px-2 pb-0">
                        <div>
                            <h2 class="card-title h1-responsive pt-3 mb-5 font-bold"><strong>Access the ongoing performance of your organization.</strong></h2>
                            <a href="#" onclick="linkTo(3, event)" class="btn btn-outline-white btn-rounded btn-lg"><i class="far fa-edit left"></i> Review Report Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>

        // get sy_id from query params
        const urlParams = new URLSearchParams(window.location.search);
        const subject_assignment_id = urlParams.get('subject_assignment_id');
        const subject_id = urlParams.get('subject_id');
        const section_id = urlParams.get('section_id');
        
        if (subject_assignment_id == null || subject_id == null) {
            location.href = './home.php';
        }

        function linkTo(num, event){
            event.preventDefault();
            if (num == 1) {
                location.href = `./q1_grade.php?subject_assignment_id=${subject_assignment_id}`;
            } else if (num == 2) {
                location.href = `./q2_grade.php?subject_assignment_id=${subject_assignment_id}`;
            } else if (num == 3) {
                location.href = `./report_data.php?subject_assignment_id=${subject_assignment_id}`; 
            }
        }

        // get students
        axios.get(`http://localhost/teachers-toolkit-app/server/api/student_assignment/read_by_section.php?section_id=${section_id}`)
            .then(res => {
                if (res.data.result == 0){
                    return;
                }
                const students = res.data.data;
                const insert_to = document.querySelector("#insert_to");
                students.forEach(stud => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${stud.id}</td>
                        <td>${stud.student_name}</td>
                        <td>${stud.LRN}</td>
                        <td>${stud.email}</td>
                        <td>${stud.address}</td>
                        <td>${stud.gender}</td>
                    `;
                    insert_to.appendChild(tr);
                });
                console.log('students :>> ', students);
                
                $('#add_stud_table').DataTable();
                $('.dataTables_length').addClass('bs-select');
            })
            .catch(err => console.log(err));

        // get subject
        axios.get(`http://localhost/teachers-toolkit-app/server/api/subject/read_one.php?id=${subject_id}`)
            .then(res => {
                if (res.data.result == 0){
                    return;
                }
                const subject = res.data;
                $("#subject_name").html(subject.subject_name);
                console.log('subject :>> ', subject);


            })
            .catch(err => console.log(err));



    </script>
</body>
</html>