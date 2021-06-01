<?php 
        session_start();
        if(isset($_SESSION['access']) && $_SESSION['access'] == 2){

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
        .check_box{
            padding: 0
        }
        label{
            width: 0px;
        }
    </style>
</head>
<body>
    <?php include '../partials/header_teacher.php'; ?>

    <h3 class="text-center mt-4 mb-0">
        Student Attendance Sheet
    </h3>
    <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mt-0 ml-1 mr-1 table_con" style="background-color: white;">
        <table id="attendance" class="table table-sm table-bordered text-center" cellspacing="0">
            <thead>
                <tr>
                    <th rowspan="3">No.</th>
                    <th rowspan="3" class="pr-0 mr-0">Name<br>(Last Name, First Name, Middle Name)</th>
                    <th colspan=25>Date</th>
                    <th rowspan="2" colspan="2">Total for the Month</th>
                </tr>
                <tr>
                    <!--Block of Table Datas-->
                    <?php
                        for($row = 0; $row < 25; $row++){
                            echo '
                                <td></td>
                            ';
                        }
                    ?>
                    <!--Display Days-->
                    </tr>
                        <?php
                            //==========LOOP DAYS================
                            // $arr = array('M', 'T', 'W', 'TH', 'F');
                            // for($row = 0; $row < 5; $row++){
                            //     for($row2 = 0; $row2 < count($arr); $row2++){
                            //         echo "
                            //             <td>".$arr[$row2]."</td>
                            //         ";
                            //     }
                            // }
                            for($row = 0; $row < 5; $row++){
                                echo "
                                    <td>M</td>
                                    <td>T</td>
                                    <td>W</td>
                                    <td>TH</td>
                                    <td style='border-right: 2px solid #212121;'>F</td>
                                ";
                            }
                                echo "
                                    <td>Absent</td>
                                    <td>Tardy</td>
                                ";
                            ?>
                    <tr>
                </tr>
            </thead>
            <tbody id="insert_to">
                <!--DATA-->
                <tr>
                    <td>1</td>
                    <td>Hill, Grace Lee</td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <!-- Separation color black -->
                    <td style='border-right: 2px solid #212121;'>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <!-- Separation color black -->
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td style='border-right: 2px solid #212121;'>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td style='border-right: 2px solid #212121;'>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td style='border-right: 2px solid #212121;'>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td style='border-right: 2px solid #212121;'>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="data"> <label class="custom-control-label ml-0" for="data"></label>
                        </div>
                    </td>
                    <td id="absent"></td>
                    <td id="tardy"></td>
                </tr>
                <!--END DATA-->

            </tbody>
        </table>
    </div>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables.min.js"></script>
    <script>
    </script>
</body>
</html>