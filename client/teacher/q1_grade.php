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
        table{
            width: 100%;
        }
        .table_con{
            border-radius: 10px 10px 0px 0px;
        }
        /* Written Transform */
        .t_input{
            transform: translateY(-58%) translateX(220%);
        }
        .w_label{
            transform: translateY(80%);
        }
        /* Performance Transform */
        .p_input{
            transform: translateY(-58%) translateX(265%);
        }
        .p_label{
            transform: translateY(80%);
        }
        /* Quarterly Transform */
        .q_input{
            transform: translateY(-20%);
        }
    </style>
</head>
<body>
    <?php include '../partials/header_teacher.php'; ?>

    <h3 class="text-center mt-4 mb-0">
        First Quarter Grade Sheet
        <a type="button" href="view_subject.php" class="btn-floating blue">
            <i class="far fa-hand-point-left" aria-hidden="true"></i>
        </a>
    </h3>
    <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mt-0 ml-1 mr-1 table_con" style="background-color: white;">
        <table id="view_grade" class="table table-sm table-bordered" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>LEARNERS'<br>NAME</th>
                    <th colspan="13" class="text-center pb-0">
                        <label for="wr_wor" class="w_label">WRITTEN WORKS</label>
                        <input type="text" id="wr_wor" name="wr_wor" style="width: 40px; margin: 0 auto" class="t_input form-control form-control-sm">
                    </th>
                    <th colspan="13" class="text-center pb-0">
                        <label for="per_task" class="p_label">PERFORMANCE TASKS</label>
                        <input type="text" id="per_task" name="per_task" style="width: 40px; margin: 0 auto" class="p_input form-control form-control-sm">
                    </th>
                    <th colspan="3" class="text-center pb-0">
                        <label for="q_asses">QUARTERLY ASSESSMENT</label>
                        <input type="text" id="q_asses" name="q_asses" style="width: 40px; margin: 0 auto" class="q_input form-control form-control-sm">
                    </th>
                    <th rowspan="3" style='width: 1%;' class="pb-5">Initial Grade</th>
                    <th rowspan="3" style='width: 1%;' class="pb-5">Quarterly Grade</th>
                </tr>
                <!--1st row-->
                <tr>
                    <td></td>
                    <td></td>
                    <!--Written Works-->
                    <?php
                        for ($row=1; $row < 11; $row++) { 
                            echo "<td>$row</td>";
                        }
                    ?>
                    <td>Total</td>
                    <td>PS</td>
                    <td>WS</td>
                    <!--Performance Tasks-->
                    <?php
                        for ($row=1; $row < 11; $row++) { 
                            echo "<td>$row</td>";
                        }
                    ?>
                    <td>Total</td>
                    <td>PS</td>
                    <td>WS</td>
                    <!--Quarterly Assessment-->
                    <td style='width: 4%;'>1</td>
                    <td style='width: 5%;'>PS</td>
                    <td style='width: 5%;'>WS</td>
                </tr>

                <!--2nd row-->
                <tr>
                    <td></td>
                    <td style="font-size:10px;" class="font-weight-normal">HIGHEST<br>POSSIBLE SCORE</td>
                    <td><input type='text' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='text' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='text' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='text' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='text' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='text' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='text' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='text' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='text' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='text' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td id="total_written"></td>
                    <td>100.00</td>
                    <td>40%</td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td id="total_perfomance"></td>
                    <td>100.00</td>
                    <td>40%</td>
                    <td><input type='text' style='width: 43px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td>100.00</td>
                    <td>40%</td>
                </tr>
            </thead>
            <!-- DATA BODY -->
            <tbody id="insert_to">
                <!--3rd row-->
                <tr>
                    <td class="table-active"></td>
                    <td class="table-active">Male</td>
                    <?php
                        for ($row=0; $row < 31; $row++) { 
                            echo "<td class='table-active'>";
                        }
                    ?>
                </tr>

                <!--DATA FOR MALE STUDENTS-->
                <!--Sample Data Preview-->
                <tr>
                    <td>1.</td>
                    <td>Donald, John Fla</td>

                    <!--Written Works-->
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td id="data_work_stud"></td>
                    <td id="data_work_ps"></td>
                    <td id="data_work_ws"></td>

                    <!--Perfomance Task-->
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td id="data_pt_stud"></td>
                    <td id="data_pt_ps"></td>
                    <td id="data_pt_ws"></td>

                    <!--Quarterly Assessment-->
                    <td><input type='text' style='width: 43px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td id="data_qa_ps"></td>
                    <td id="data_qa_ws"></td>
                    <td id="init_grade"></td>
                    <td id="quar_grade"></td>
                </tr>
                
                <!--4th row-->
                <tr>
                    <td class="table-active"></td>
                    <td class="table-active">Female</td>
                    <?php
                        for ($row=0; $row < 31; $row++) { 
                            echo "<td class='table-active'>";
                        }
                    ?>
                </tr>

                <!--DATA FOR FEMALE STUDENTS-->
                <!--Sample Data Preview-->
                <tr>
                    <td>1.</td>
                    <td>Hill, Grace Kate</td>
                    <!--Written Works-->
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td id="data_work_stud"></td>
                    <td id="data_work_ps"></td>
                    <td id="data_work_ws"></td>

                    <!--Perfomance Task-->
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td><input type='text' style='width: 20px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td id="data_pt_stud"></td>
                    <td id="data_pt_ps"></td>
                    <td id="data_pt_ws"></td>

                    <!--Quarterly Assessment-->
                    <td><input type='text' style='width: 43px' class='form-control form-control-sm form-control-plaintext'></td>
                    <td id="data_qa_ps"></td>
                    <td id="data_qa_ws"></td>
                    <td id="init_grade"></td>
                    <td id="quar_grade"></td>
                </tr>

            </tbody>
        </table>
    </div>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables.min.js"></script>
    <script>
    </script>
</body>
</html>