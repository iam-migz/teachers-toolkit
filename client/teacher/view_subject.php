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
    <!-- DataTables Select CSS -->
    <link href="../mdb/css/addons/datatables-select2.min.css" rel="stylesheet">
    <style>
        .container{
            background-color: white;
            margin-top: 4%;
        }
        .btn_proceed{
            width: 97%;
        }
    </style>
</head>
<body>
    <?php include '../partials/header_teacher.php'; ?>

    <h3 class="display-4 text-center mt-4 mb-0">View Subject</h3>
    <div class="container mt-4">
        <ul class="nav md-pills nav-justified pills-success-color-dark mb-4">
            <li class="nav-item pl-0">
                <a class="nav-link active " data-toggle="tab" href="#add_stud" role="tab">Add Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#stud_list" role="tab">Student List</a>
            </li>
            <li class="nav-item pr-0">
                <a class="nav-link" data-toggle="tab" href="#view_grades" role="tab">View Grades</a>
            </li>
            <li class="nav-item pr-0">
                <a class="nav-link" data-toggle="tab" href="#edit_sub" role="tab">Edit Subject</a>
            </li>
        </ul>
        <div class="tab-content">
            <!--Panel Add Student-->
            <div class="tab-pane fade in show active" id="add_stud" role="tabpanel">
                <h5 class="text-center text-uppercase py-4 mt-0 mb-0">
                    Student List
                </h5>
                <div class="table-responsive-sm table-responsive-md table-responsive-lg mt-0">
                    <table id="add_stud" class="table table-sm" cellspacing="0" width="100%">
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
                                <td scope="row">
                                    <input class="form-check-input" type="checkbox" id="add_stud">
                                    <label class="form-check-label" for="add_stud" class="label-table"></label>
                                </td>
                                <td>1927</td>
                                    <td>Hill, Grace</td>
                                    <td>19273</td>
                                    <td>grace@gmail.com</td>
                                    <td>barangay, province, city</td>
                                <td>F</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <input class="form-check-input" type="checkbox" id="2">
                                    <label class="form-check-label" for="2" class="label-table"></label>
                                </th>
                                <td>1927</td>
                                    <td>Hill, Grace</td>
                                    <td>19273</td>
                                    <td>grace@gmail.com</td>
                                    <td>barangay, province, city</td>
                                <td>F</td>
                            </tr>
                        </tbody>
                        <div id="count">No Rows Selected</div>
                    </table>
                </div>
            </div>
            <!--Panel Student List-->
            <div class="tab-pane fade" id="stud_list" role="tabpanel">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
                reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione
                porro voluptate odit minima.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
                reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione
                porro voluptate odit minima.</p>
            </div>
            <!--Panel View Grades-->
            <div class="tab-pane fade" id="view_grades" role="tabpanel">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
                reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione
                porro voluptate odit minima.</p>
            </div>
            <!--Panel Edit Sub-->
            <div class="tab-pane fade" id="edit_sub" role="tabpanel">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
                reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione
                porro voluptate odit minima.</p>
            </div>
        </div>

    </div>

     <!-- MDBootstrap Datatables  -->
     <script type="text/javascript" src="../mdb/js/addons/datatables.min.js"></script>
    <!-- DataTables Select JS -->
    <script src="../mdb/js/addons/datatables-select2.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //select
            $('.mdb-select').materialSelect();

            //datatable checkbox
            $('#add_stud').DataTable({
                columnDefs: [{
                    targets: 0,
                    orderable: false,
                }],
                order:  [[ 1, "asc"]]
            });

            $("input[type='checkbox']").on("change", function(){
                let checkedcount = $("input[type='checkbox']:checked").length;
                let count = document.getElementById('count');

                if(!checkedcount){
                    count.innerHTML = "No Rows Selected";
                } else if(checkedcount > 1){
                    count.innerHTML = checkedcount + " Rows Selected";
                } else{
                    count.innerHTML = checkedcount + " Row Selected";               
                }

            });

            $(document).on('change', '.chk', function() {
            var result = countChecked($('#myTable'), '.chk');
            $('#checked').html(result.checked);
            $('#total').html(result.total);
            });

            //add classes
            $('#add_stud_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#add_stud_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Search..");
                $this.removeClass('form-control-sm');
            });
            $('#add_stud_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#add_stud_wrapper .dataTables_filter').addClass('md-form mt-3');
            $('#add_stud_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
            $('#add_stud_wrapper select').addClass('mdb-select colorful-select dropdown-primary');
            $('#add_stud_wrapper .mdb-select').materialSelect();
            $('#add_stud_wrapper .dataTables_filter').find('label').remove();  
        });

    </script>
</body>
</html>