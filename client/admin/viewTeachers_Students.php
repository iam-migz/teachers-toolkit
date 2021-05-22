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
    <link href="../mdb/css/addons/datatables.min.css" rel="stylesheet">

    <style>
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
        }
    </style>
</head>
<body>
    <!--Main Header-->
    <?php include '../partials/header_admin.php'; ?>

    <div class="container mt-5">
        <div class="card">
                <!-- Nav Pills -->
                <ul class="nav md-pills nav-justified" id="pills-tab" role="tablist">
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
                <div class="pl-3 pr-3 pb-0 pt-0 tab-content" id="pills-tabContent">
                    <!--Teacher List-->
                    <div class="tab-pane fade show active" id="pills-teachList" role="tabpanel">
                        <div class="table-responsive-sm table-responsive-md table-responsive-lg">
                            <table id="teacher_table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">Teacher Id</th>
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
                            <table id="student_table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">Student ID</th>
                                        <th class="th-sm">Name</th>
                                        <th class="th-sm">LRN</th>
                                        <th class="th-sm">Email Address</th>
                                        <th class="th-sm">Address</th>
                                        <th class="th-sm">Gender</th>
                                        <th class="th-sm">Edit</th>
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


    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables.min.js"></script>
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
                    <td>${teach.user_id}</td>
                    <td>${teach.firstname} ${teach.middlename} ${teach.lastname}</td>
                    <td>${teach.phone_no}</td>
                    <td>${teach.email}</td>
                    <td><a href="edit_teacher.php?teacher_id=${teach.id}" class="btn btn-green btn-sm m-0" style="width: 100%;" role="button">Edit</a></td>
                `;
                insert_to.appendChild(tr);
            });
            $('#teacher_table').DataTable();
            $('.dataTables_length').addClass('bs-select');

            //teacher
            $('#teacher_table_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#teacher_table_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Search..");
                $this.removeClass('form-control-sm');
            });
            $('#teacher_table_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#teacher_table_wrapper .dataTables_filter').addClass('md-form mt-3');
            $('#teacher_table_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
            $('#teacher_table_wrapper select').addClass('mdb-select colorful-select dropdown-primary');
            $('#teacher_table_wrapper .mdb-select').materialSelect();
            $('#teacher_table_wrapper .dataTables_filter').find('label').remove();
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
                        <td>${stud.user_id}</td>
                        <td>${stud.firstname} ${stud.middlename} ${stud.lastname}</td>
                        <td>7878</td>
                        <td>${stud.email}</td>
                        <td>${stud.barangay}, ${stud.city}, ${stud.province}</td>
                        <td>${stud.gender}</td>
                        <td><a href="edit_student.php?student_id=${stud.id}" class="btn btn-green btn-sm m-0" style="width: 100%;" role="button">Edit</a></td>
                `;
                insert_to.appendChild(tr);
            });
            $('#student_table').DataTable();
            $('.dataTables_length').addClass('bs-select');
            
            //student
            $('#student_table_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#student_table_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Search..");
                $this.removeClass('form-control-sm');
            });
            $('#student_table_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#student_table_wrapper .dataTables_filter').addClass('md-form mt-3');
            $('#student_table_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
            $('#student_table_wrapper select').addClass('mdb-select colorful-select dropdown-primary');
            $('#student_table_wrapper .mdb-select').materialSelect();
            $('#student_table_wrapper .dataTables_filter').find('label').remove();
        })
        .catch(err => console.log(err));
 
    </script>
</body>
</html>