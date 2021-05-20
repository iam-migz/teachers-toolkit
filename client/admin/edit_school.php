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
    </style>
</head>
<body>
    <!--Main Header-->
    <?php include '../partials/header.php'; ?>
    
    <div class="view-container">
        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Edit School Information</h3>
            <div class="card-body">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg">
                    <table id="paginationFirstLast" class="table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">#</th>
                                <th class="th-sm">School Name</th>
                                <th class="th-sm">School Address</th>
                                <th class="th-sm">Postal Code</th>
                                <th class="th-sm">Country</th>
                                <th class="th-sm">School Principal</th>
                                <th class="th-sm">Save</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td contenteditable="true">University of Lapu-Lapu</td>
                                <td contenteditable="true">Province Barangay City</td>
                                <td contenteditable="true">21046</td>
                                <td contenteditable="true">Philippines</td>
                                <td contenteditable="true">Domingo, Carda Mi</td>
                                <td><button type="button" class="btn btn-blue btn-sm m-0" style="width: 100%;">Save</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td contenteditable="true">University of Science and Social</td>
                                <td contenteditable="true">Province Barangay City</td>
                                <td contenteditable="true">71287</td>
                                <td contenteditable="true">Philippines</td>
                                <td contenteditable="true">Jacome, Luis San</td>
                                <td><button type="button" class="btn btn-blue btn-sm m-0" style="width: 100%;">Save</button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td contenteditable="true">Techonology and English School</td>
                                <td contenteditable="true">Province Barangay City</td>
                                <td contenteditable="true">88237</td>
                                <td contenteditable="true">Philppines</td>
                                <td contenteditable="true">Foreign, Mill Lee</td>
                                <td><button type="button" class="btn btn-blue btn-sm m-0" style="width: 100%;">Save</button></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="th-sm">#</th>
                                <th class="th-sm">School Name</th>
                                <th class="th-sm">School Address</th>
                                <th class="th-sm">Postal Code</th>
                                <th class="th-sm">Country</th>
                                <th class="th-sm">School Principal</th>
                                <th class="th-sm">Save</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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
            School Information Successfully Updated.
        </div> 
    </div>

    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables2.min.js"></script>
    <!-- DataTables Select JS -->
    <script src="../mdb/js/addons/datatables-select2.min.js" type="text/javascript"></script>
        
    <script type="text/javascript">
        $(document).ready(function () {
            $('#paginationFirstLast').DataTable({
                "pagingType": "first_last_numbers"
            }); 
            $('#paginationFirstLast_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#paginationFirstLast_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Search..");
                $this.removeClass('form-control-sm');
                $this.addClass('w-75');
            });
            $('#paginationFirstLast_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#paginationFirstLast_wrapper .dataTables_filter').addClass('md-form mt-3');
            $('#paginationFirstLast_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm mt-3');
            $('#paginationFirstLast_wrapper select').addClass('mdb-select colorful-select dropdown-primary');
            $('#paginationFirstLast_wrapper .mdb-select').materialSelect();
            $('#paginationFirstLast_wrapper .dataTables_filter').find('label').remove();
        });
    </script>
</body>
</html>