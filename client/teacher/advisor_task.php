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
    <!-- MDBootstrap Datatables  -->
    <link href="../mdb/css/addons/datatables.min.css" rel="stylesheet">
    <style>
        .container{
            background-color: white;
            margin-top: 4%;
        }
    </style>
</head>
<body>
    <?php include '../partials/header_teacher.php'; ?>

    <h3 class="text-center mt-4 mb-0">
        Advisory Task
        <a type="button" href="subject_lists.php" class="btn-floating blue">
            <i class="far fa-hand-point-left" aria-hidden="true"></i>
        </a>
    </h3>
    <div class="container mt-4">
        <ul class="nav md-pills nav-justified pills-success-color-dark mb-4">
            <li class="nav-item pl-0">
                <a class="nav-link active " data-toggle="tab" href="#student_lists" role="tab">
                <i class="fas fa-user-graduate mr-2 fa-lg"></i>
                Your Students</a>
            </li>
            <li class="nav-item pl-0">
                <a class="nav-link" data-toggle="tab" href="#subject_lists" role="tab">
                <i class="fas fa-star mr-2 fa-lg"></i>
                Your Subjects</a>
            </li>
            <li class="nav-item pl-0">
                <a class="nav-link" data-toggle="tab" href="#report_card" role="tab">
                <i class="fas fa-star mr-2 fa-lg"></i>
                Report Events</a>
            </li>
        </ul>
        <div class="tab-content mb-4">
            <!--Panel Students-->
            <div class="tab-pane fade in show active" id="student_lists" role="tabpanel">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg mt-0 mt-0">
                    <table id="your_students" class="table table-sm table-hover" cellspacing="0" width="100%">
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
                        <tbody id="insert_to_students">
                            <!-- DATA -->
                            <tr>
                                <td>1098</td>
                                <td>Mendoza, Dhony Mark Dupio</td>
                                <td>19102710</td>
                                <td>DhonyMark@gmail.com</td>
                                <td>Province, Barangay, City</td>
                                <td>M</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Panel Subjects-->
            <div class="tab-pane fade" id="subject_lists" role="tabpanel">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg mt-0">
                    <table id="your_subjects" class="table table-sm table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Subject Name</th>
                                <th class="th-sm">Semester</th>
                                <th class="th-sm">Hours</th>
                            </tr>
                        </thead>
                        <tbody id="insert_to_subjects">
                            <!-- DATA -->
                            <tr>
                                <td>View of Analytics</td>
                                <td>1st Semester</td>
                                <td>20</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Panel Report Card-->
            <div class="tab-pane fade" id="report_card" role="tabpanel">
                <div class="card card-image mb-3" style="background-image: url(../images/gradient.jpg);">
                    <div class="text-white text-center rgba-stylish-strong py-5 px-4">
                        <div class="py-5">
                            <h2 class="card-title h2 my-2 py-1">Generated Report Card</h2>
                            <p class="mb-4 pb-2 px-md-5 mx-md-5">Teachers can use report cards to communicate with students' 
                                parents about their academic achievement and general school activities.</p>
                            <a class="btn btn-rounded btn-outline-warning"><i class="fas fa-clone left"></i> Evaluate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#your_students').DataTable({
                ordering: false,
                bLengthChange: false,
                bPaginate: false,
                bInfo: false,
            });
            $('#your_subjects').DataTable({
                ordering: false,
                bLengthChange: false,
                bPaginate: false,
                bInfo: false,
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>

</body>
</html>