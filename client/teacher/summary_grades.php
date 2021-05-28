<?php 
        session_start();
        if(isset($_SESSION['access']) && $_SESSION['access'] == 1){

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
    <?php include '../partials/header_teacher.php'; ?>

    <div class="container mt-5">
        <div class="card">
            <h2 class="text-center mt-4 mb-0">
                <span id="strand_name">Technical-Vocational-Livelihood</span>
                <!-- <a type="button" href="subject_lists.php" class="btn-floating blue">
                    <i class="far fa-hand-point-left" aria-hidden="true"></i>
                </a> -->
                <p class="font-small">(Effective SY: 2018 - 2019)</p>
            </h2>
            <div class="card-body">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg">
                    <table id="grading_table" class="table table-sm table-hover" cellspacing="0" cellpadding="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Learners' Names</th>
                                <th class="th-sm">First Quarter</th>
                                <th class="th-sm">Second Quarter</th>
                                <th class="th-sm">FINAL GRADE</th>
                            </tr>
                        </thead>
                        <tbody id="student_field">
                            <!-- DATA -->
                            <!-- MALES -->
                            <tr id="boys">
                                <th disabled class="table-active">Male</td>
                                <?php
                                    for ($row=0; $row < 3; $row++) { 
                                        echo "<th disabled class='table-active'>";
                                    }
                                ?>
                            </tr>
                            
                            <!-- Sample Data MALE-->
                            <tr>
                                <td>Hilson, Grey Joo</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                            </tr>

                            <!-- FEMALES -->
                            <tr id="girls">
                                <th disabled class="table-active">Female</th>
                                <?php
                                    for ($row=0; $row < 3; $row++) { 
                                        echo "<th disabled class='table-active'>";
                                    }
                                ?>
                            </tr>
                            <!-- Sample Data FEMALE-->
                            <tr>
                                <td>Cruz, Stacy Lim</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
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
        $('#grading_table').DataTable({
            bLengthChange: false,
            bPaginate: false,
            bInfo: false,
            ordering: false,
            searching: false

        });
        $('.dataTables_length').addClass('bs-select');
    });
    </script>
</body>
</html>