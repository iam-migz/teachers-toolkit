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
        <div class="tab-content mb-4">
            <!--Panel Add Student-->
            <div class="tab-pane fade in show active" id="add_stud" role="tabpanel">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg mt-0">
                    <table id="add_stud_table" class="table table-sm" cellspacing="0" width="100%">
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
                                <th scope="row">
                                    <input class="form-check-input" type="checkbox" id="1">
                                    <label class="form-check-label" for="1" class="label-table"></label>
                                </th>
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
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <button type="button" class="btn btn-rounded btn-outline-success btn-block btn-md waves-effect m-auto">
                                        <i class="fas fa-plus" aria-hidden="true"></i>
                                         Add Student
                                    </button>
                                </td>
                            </tr>
                        </tfoot>
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
    <script>
        $(document).ready(function () {
            $('#add_stud_table').DataTable();
            $('.dataTables_length').addClass('bs-select');

            //row count
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

        });
    </script>
</body>
</html>