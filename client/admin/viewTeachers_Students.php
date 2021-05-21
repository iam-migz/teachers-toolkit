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
    <!-- MDBootstrap Datatables  -->
    <link href="../mdb/css/addons/datatables2.min.css" rel="stylesheet">
    <!-- DataTables Select CSS -->
    <link href="../mdb/css/addons/datatables-select2.min.css" rel="stylesheet">

    <style>
        body, html{ min-height: 100%; }
        body{
            background-image: url(../images/sample.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            margin-bottom: 5%;
        }
        .view-container{
            margin: 2% 2% 4% 2%;
        }
        .return{
            width: 100%;
        }
    </style>
</head>
<body>
    <!--Main Header-->
    <?php include '../partials/header.php'; ?>

    <div class="view-container">
        <div class="card">
            <div class="card-body">
                <!-- Nav Pills -->
                <ul class="nav md-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-teachList-tab" data-toggle="pill" href="#pills-teachList" role="tab" aria-controls="pills-teachList" aria-selected="false">
                        <span class="nav-link_text">
                            Teacher Lists
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-studList-tab" data-toggle="pill" href="#pills-studList" role="tab" aria-controls="pills-studList" aria-selected="false">
                        <span class="nav-link_text">
                            Student Lists
                        </span>
                        </a>
                    </li>
                </ul>
                <!--End of Nav Pills-->
                <hr>
                <!-- Tab panes -->
                <div class="tab-content" id="pills-tabContent">
                <a href="home.php" class="btn btn-blue btn-m m-0 return" role="button">Return</a>
                    <!--Teacher List-->
                    <div class="tab-pane fade show active" id="pills-teachList" role="tabpanel">
                        <div class="table-responsive-sm table-responsive-md table-responsive-lg">
                            <table id="dt-teacher-checkbox" class="table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="th-sm">id</th>
                                        <th class="th-sm">Name</th>
                                        <th class="th-sm">Phone Number</th>
                                        <th class="th-sm">Email Address</th>
                                        <th class="th-sm">Edit</th>
                                    </tr>
                                </thead>
                                <tbody id="teacher_field">
                                <!-- data from db -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--End Teacher List-->

                    <!--Student List-->
                    <div class="tab-pane fade" id="pills-studList" role="tabpanel" aria-labelledby="pills-studList-tab">
                        <div class="table-responsive-sm table-responsive-md">
                            <table id="dt-student-checkbox" class="table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="th-sm">id</th>
                                        <th class="th-sm">Name</th>
                                        <th class="th-sm">LRN</th>
                                        <th class="th-sm">Email Address</th>
                                        <th class="th-sm">Address</th>
                                        <th class="th-sm">Gender</th>
                                        <th class="th-sm">Gender</th>

                                    </tr>
                                </thead>
                                <tbody id="student_field">
                                <!-- data from db -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--End of Student Lists-->

                </div> <!--End of Tab Panels-->
            </div>
        </div>
    </div>

    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables2.min.js"></script>
    <!-- DataTables Select JS -->
    <script src="../mdb/js/addons/datatables-select2.min.js" type="text/javascript"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">

    const school_id = <?php echo $_SESSION['school_id']; ?>;
    
    axios.get(`http://localhost/teachers-toolkit-app/server/api/teacher/read.php?school_id=${school_id}`)
        .then(res => {
            if (res.data.result == 0) {
                return;
            }
            const teacher = res.data.data;
            console.log(teacher);
            const insert_to = document.querySelector("#teacher_field");
            teacher.forEach(teach => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td></td>
                    <td>${teach.id}</td>
                    <td>${teach.firstname} ${teach.middlename} ${teach.lastname}</td>
                    <td>${teach.phone_no}</td>
                    <td>${teach.email}</td>
                    <td><button type="button" class="btn btn-success btn-sm m-0">Edit</button></td>
                `;
                insert_to.appendChild(tr);
            });
            $('#dt-teacher-checkbox').dataTable({
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox select-checkbox-all',
                    targets: 0
                }],
                select: {
                    style: 'teacher',
                    selector: 'td:first-child'
                }
            });
        })
        .catch(err => console.log(err));

    axios.get(`http://localhost/teachers-toolkit-app/server/api/student/read.php?school_id=${school_id}`)
        .then(res => {
            if (res.data.result == 0) {
                return;
            }
            const students = res.data.data;
            console.log('students', students);
            const insert_to = document.querySelector("#student_field");
            students.forEach(stud => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                        <td></td>
                        <td>${stud.user_id}</td>
                        <td>${stud.firstname} ${stud.middlename} ${stud.lastname}</td>
                        <td>7878</td>
                        <td>${stud.email}</td>
                        <td>${stud.barangay}, ${stud.city}, ${stud.province}</td>
                        <td>${stud.gender}</td>
                        <td><button type="button" class="btn btn-success btn-sm m-0">Edit</button></td>
                `;
                insert_to.appendChild(tr);
            });
            $('#dt-student-checkbox').dataTable({
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox select-checkbox-all',
                    targets: 0
                }],
                select: {
                    style: 'student',
                    selector: 'td:first-child'
                }
            });
        })
        .catch(err => console.log(err));


        $(document).ready(function(){
            //student

            $('#dt-student-checkbox_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#dt-student-checkbox_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Search..");
                $this.removeClass('form-control-sm');
                $this.addClass('w-75');
            });
            $('#dt-student-checkbox_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#dt-student-checkbox_wrapper .dataTables_filter').addClass('md-form mt-3');
            $('#dt-student-checkbox_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm mt-3');
            $('#dt-student-checkbox_wrapper select').addClass('mdb-select colorful-select dropdown-primary');
            $('#dt-student-checkbox_wrapper .mdb-select').materialSelect();
            $('#dt-student-checkbox_wrapper .dataTables_filter').find('label').remove();

            //teacher

            $('#dt-teacher-checkbox_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#dt-teacher-checkbox_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Search");
                $this.removeClass('form-control-sm');
                $this.addClass('w-75');
            });
            $('#dt-teacher-checkbox_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#dt-teacher-checkbox_wrapper .dataTables_filter').addClass('md-form mt-3');
            $('#dt-teacher-checkbox_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm mt-3');
            $('#dt-teacher-checkbox_wrapper select').addClass('mdb-select colorful-select dropdown-primary');
            $('#dt-teacher-checkbox_wrapper .mdb-select').materialSelect();
            $('#dt-teacher-checkbox_wrapper .dataTables_filter').find('label').remove();
        });

 
    </script>
</body>
</html>