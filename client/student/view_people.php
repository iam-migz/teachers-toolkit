<?php 
        session_start();
        if(isset($_SESSION['access']) && $_SESSION['access'] == 1){

        }else{
            header("location: http://localhost/teachers-toolkit-app/client/login/login.html");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- MDBootstrap Cards Extended Pro  -->
    <link href="../mdb/css/addons-pro/cards-extended.min.css" rel="stylesheet">
    <!-- MDBootstrap Datatables  -->
    <link href="../mdb/css/addons/datatables.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .container{
            margin-top: 4%;
        }
        table thead tr th:first-child{
            width: 40em;
        }
        table thead tr th{
            font-weight: 420;
        }
        .stud_name_set{
            font-size: 18px;
        }
    </style>
</head>
<body>
    <?php include '../partials/header_student.php'; ?>

    <div class="container mt-5">
        <div class="card">
            <h2 class="text-center mt-4 mb-0">
                <span id="strand_name">People</span>
                <a type="button" href="subject_lists.php" class="btn-floating blue">
                    <i class="far fa-hand-point-left" aria-hidden="true"></i>
                </a>
            </h2>
            <div class="card-body">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg">
                    <table id="view_people" class="table table-sm table-hover" cellspacing="0" cellpadding="0" width="100%">
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
                        <tbody id="student_field">
                            <!-- data from db -->
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#view_people').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
    </script>
</body>