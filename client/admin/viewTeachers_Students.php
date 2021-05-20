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
        .container{
            margin-top: 2%;
            background-color: white;
            padding: 10px;
            margin-bottom: 4%;
            border-radius: 5px;
        }
        .return{
            width: 100%;
        }
    </style>
</head>
<body>
    <!--Main Header-->
    <?php include '../partials/header.php'; ?>

    <div class="container border">
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
                <table id="dt-teacher-checkbox" class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="th-sm">Full Name</th>
                            <th class="th-sm">Phone Number</th>
                            <th class="th-sm">Email Address</th>
                            <th class="th-sm">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>Reyes, Miguel Gomez</td>
                            <td>09263281762</td>
                            <td>miguel123@gmail.com</td>
                            <td><button type="button" class="btn btn-red btn-sm m-0">Remove</button></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Riller, Sam Hill</td>
                            <td>09334477545</td>
                            <td>same113@gmail.com</td>
                            <td><button type="button" class="btn btn-red btn-sm m-0">Remove</button></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Foreign, Mill Lee</td>
                            <td>09992784325</td>
                            <td>foreign123@gmail.com</td>
                            <td><button type="button" class="btn btn-red btn-sm m-0">Remove</button></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Full Name</th>
                            <th>Phone Number</th>
                            <th>Email Address</th>
                            <th>Remove</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!--End Teacher List-->

            <!--Student List-->
            <div class="tab-pane fade" id="pills-studList" role="tabpanel" aria-labelledby="pills-studList-tab">
                <table id="dt-student-checkbox" class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="th-sm">LRN</th>
                            <th class="th-sm">Full Name</th>
                            <th class="th-sm">Email Address</th>
                            <th class="th-sm">Address</th>
                            <th class="th-sm">Gender</th>
                            <th class="th-sm">Age</th>
                            <th class="th-sm">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>1910</td>
                            <td>Reyes, Miguel Gomez</td>
                            <td>miguel123@gmail.com</td>
                            <td>Provine Barangay City</td>
                            <td>Male</td>
                            <td>20</td>
                            <td><button type="button" class="btn btn-red btn-sm m-0">Remove</button></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>2392</td>
                            <td>Mendoza, Dhony Sil</td>
                            <td>dhony123@gmail.com</td>
                            <td>Provine Barangay City</td>
                            <td>Male</td>
                            <td>21</td>
                            <td><button type="button" class="btn btn-red btn-sm m-0">Remove</button></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>1888</td>
                            <td>Cruz, Stacy Lim</td>
                            <td>stacy009@gmail.com</td>
                            <td>Provine Barangay City</td>
                            <td>Female</td>
                            <td>19</td>
                            <td><button type="button" class="btn btn-red btn-sm m-0">Remove</button></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>LRN</th>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Remove</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!--End of Student Lists-->

        </div> <!--End of Tab Panels-->
    </div>

    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables2.min.js"></script>
    <!-- DataTables Select JS -->
    <script src="../mdb/js/addons/datatables-select2.min.js" type="text/javascript"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            //Teacher
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

            //Student
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