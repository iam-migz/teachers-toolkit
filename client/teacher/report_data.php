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
        Report Data
        <a type="button" href="subject_lists.php" class="btn-floating blue">
            <i class="far fa-hand-point-left" aria-hidden="true"></i>
        </a>
    </h3>
    <div class="container mt-4">
        <ul class="nav md-pills nav-justified pills-success-color-dark mb-4">
            <li class="nav-item pl-0">
                <a class="nav-link active " data-toggle="tab" href="#highest_grade" role="tab">
                <i class="fas fa-user-graduate mr-1 fa-lg"></i><i class="fas fa-angle-double-up mr-2 fa-sm"></i>
                Students Highest Grade</a>
            </li>
            <li class="nav-item pl-0">
                <a class="nav-link" data-toggle="tab" href="#lowest_grade" role="tab">
                <i class="fas fa-user-graduate mr-1 fa-lg"></i><i class="fas fa-angle-double-down mr-2 fa-sm"></i>
                Students Lowest Grade</a>
            </li>
        </ul>

        <div class="tab-content mb-4">
        
            <!--Panel Highest Grade-->
            <div class="tab-pane fade in show active" id="highest_grade" role="tabpanel">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg mt-0">
                    <h2 class="text-center mt-0 mb-4 pt-0">
                        Students
                    </h2>
                    <table id="highest" class="table table-sm" cellspacing="0" width="100%">
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
                            <tr>
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
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!--Panel Lowest Grade-->
            <div class="tab-pane fade" id="lowest_grade" role="tabpanel">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg mt-0">
                    <h2 class="text-center mt-0 mb-4 pt-0">
                        Students
                    </h2>
                    <table id="lowest" class="table table-sm" cellspacing="0" width="100%">
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
                            <tr>
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
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="report_events" role="tabpanel">
            </div>

        </div>

    </div>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#highest').DataTable({
                "bLengthChange": false,
                "searching": false
            });
            $('.dataTables_length').addClass('bs-select');
        });
        $(document).ready(function () {
            
            $('#lowest').DataTable({
                "bLengthChange": false,
                "searching": false
            });

            $('.dataTables_length').addClass('bs-select');
        });
    </script>
</body>
</html>