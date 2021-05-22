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
    <!-- MDBootstrap Datatables  -->
    <link href="../../mdb/css/addons/datatables.min.css" rel="stylesheet">    
    <!-- DataTables Select CSS -->
    <link href="../../mdb/css/addons/datatables-select2.min.css" rel="stylesheet">

    <title>Document</title>

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
    <?php include 'header.php'; ?>
    
    <div class="container mt-4 mb-5">
        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
                Student Section Assign
                <a type="button" href="../school_year/sy_home.php" class="btn-floating blue">
                    <i class="far fa-hand-point-left" aria-hidden="true"></i>
                </a>
            </h3>
            <div class="card-body">
                <div class="form-group mb-0">
                    <select class="mdb-select md-form colorful-select dropdown-primary" searchable="Search Section.." id="section">
                    <option value="Section Class" disabled selected>Section Class</option>
                        <!-- data -->
                    </select>
                    <label class="mdb-main-label">Select Section</label>
                </div>
                <h5 class="text-center text-uppercase py-4 mt-0 mb-0">
                    Student List
                </h5>
                <div class="table-responsive-sm table-responsive-md table-responsive-lg mt-0">
                    <table id="assign_stud" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th></th>
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
                                <td></td>
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
                <button type="button" class="btn btn-outline-success btn-rounded btn-sm waves-effect"><i class="fas fa-cogs pr-2"
                aria-hidden="true"></i>Assign</button>
            </div>
        </div>
    </div>

    <!-- TOAST -->
    <div class="toast" id="EpicToast" role="alert" aria-live="assertive" aria-atomic="true" style="position:absolute; top: 80px; right: 40px;">
        <div class="toast-header">
            <strong class="mr-auto">Notification</strong>
            <small>Teachers Toolkit</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Subject Successfully Assigned to Section.
        </div> 
    </div>

    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../../mdb/js/addons/datatables.min.js"></script>
    <!-- DataTables Select JS -->
    <script src="../../mdb/js/addons/datatables-select2.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.mdb-select').materialSelect();

            $('#assign_stud').dataTable({
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }],
                select: {
                    style: 'os',
                    selector: 'td:first-child'
                }
            });
            $('#assign_stud_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#assign_stud_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Search..");
                $this.removeClass('form-control-sm');
            });
            $('#assign_stud_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#assign_stud_wrapper .dataTables_filter').addClass('md-form mt-3');
            $('#assign_stud_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
            $('#assign_stud_wrapper select').addClass('mdb-select colorful-select dropdown-primary');
            $('#assign_stud_wrapper .mdb-select').materialSelect();
            $('#assign_stud_wrapper .dataTables_filter').find('label').remove();  
        });

    </script>
</body>
</html>