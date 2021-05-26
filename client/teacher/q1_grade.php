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

        /* hide handle bar number input */
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
           -moz-appearance: textfield;
        }

        input[type=number] {
            background: #eaeaea;
            text-align: center;
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
                        <label for="written_weight" class="w_label">WRITTEN WORKS</label>
                        <input type="number" id="written_weight" name="written_weight" style="width: 40px; margin: 0 auto" class="t_input form-control form-control-sm">
                    </th>
                    <th colspan="13" class="text-center pb-0">
                        <label for="performance_weight" class="p_label">PERFORMANCE TASKS</label>
                        <input type="number" id="performance_weight" name="performance_weight" style="width: 40px; margin: 0 auto" class="p_input form-control form-control-sm">
                    </th>
                    <th colspan="3" class="text-center pb-0">
                        <label for="quarterly_weight">QUARTERLY ASSESSMENT</label>
                        <input type="number" id="quarterly_weight" name="quarterly_weight" style="width: 40px; margin: 0 auto" class="q_input form-control form-control-sm">
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
                <tr id="classrecord_detail">
                    <td></td>
                    <td style="font-size:10px;" class="font-weight-normal">HIGHEST<br>POSSIBLE SCORE</td>
                    <td><input type='number' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='number' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='number' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='number' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='number' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='number' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='number' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='number' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='number' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td><input type='number' style='width: 20px;' class='form-control form-control-sm form-control-plaintext highestWritten'></td>
                    <td id="crd_total_written"></td>
                    <td id="crd_ps_written">100.00</td>
                    <td id="crd_ws_written">40%</td>
                    <td><input type='number' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='number' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='number' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='number' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='number' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='number' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='number' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='number' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='number' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td><input type='number' style='width: 20px' class='form-control form-control-sm form-control-plaintext highestPerformance'></td>
                    <td id="crd_total_performance"></td>
                    <td id="crd_ps_performance">100.00</td>
                    <td id="crd_ws_performance"></td>
                    <td><input type='number' style='width: 43px' class='form-control form-control-sm form-control-plaintext highestQuarterly'></td>
                    <td id="crd_ps_quarterly">100.00</td>
                    <td id="crd_ws_quarterly">40%</td>
                </tr>
            </thead>
            <!-- DATA BODY -->
            <tbody>
                <!--3rd row-->
                <tr id="boys">
                    <td class="table-active"></td>
                    <td class="table-active">Male</td>
                    <?php
                        for ($row=0; $row < 31; $row++) { 
                            echo "<td class='table-active'>";
                        }
                    ?>
                </tr>

                <!--DATA FOR MALE STUDENTS-->
               
                
                <!--4th row-->
                <tr id="girls">
                    <td class="table-active"></td>
                    <td class="table-active">Female</td>
                    <?php
                        for ($row=0; $row < 31; $row++) { 
                            echo "<td class='table-active'>";
                        }
                    ?>
                </tr>

                <!--DATA FOR FEMALE STUDENTS-->
           

            </tbody>
        </table>
    </div>
    <button type="button" class="btn btn-primary" onclick="update()">Button</button>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>

    document.addEventListener("DOMContentLoaded", async () => { 
        const urlParams = new URLSearchParams(window.location.search);
        const subject_assignment_id = urlParams.get('subject_assignment_id');

        if (subject_assignment_id == null) {
            location.href = './home.php';
        }

        try {
            // set classrecord detail
            let res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord_detail/read_by_subject_assignment.php?subject_assignment_id=${subject_assignment_id}&quarter=1`);
            let crd = res.data;
            crd.total_written = Number(crd.hw1) + Number(crd.hw2) + Number(crd.hw3) + Number(crd.hw4) + Number(crd.hw5) + Number(crd.hw6) + Number(crd.hw7) + Number(crd.hw8) + Number(crd.hw9) + Number(crd.hw10);
            crd.total_performance = Number(crd.hp1) + Number(crd.hp2) + Number(crd.hp3) + Number(crd.hp4) + Number(crd.hp5) + Number(crd.hp6) + Number(crd.hp7) + Number(crd.hp8) + Number(crd.hp9) + Number(crd.hp10);
            setClassrecordDetail(crd);



            // set classrecord
            res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord/read_by_subject_assignment.php?subject_assignment_id=${subject_assignment_id}&quarter=1`);
            if(res.data.result == 0) return;
            let students = res.data.data;
            console.log('students :>> ', students);

            // divide by gender
            let boys = [], girls = [];
            students.forEach(stud => {
                if (stud.gender == 'm') {
                    boys.push(stud);
                } else if (stud.gender == 'f'){
                    girls.push(stud);
                }
            })
            // sort names
            boys.sort((a, b) => a.student_name.localeCompare(b.student_name))
            girls.sort((a, b) => a.student_name.localeCompare(b.student_name))
            console.log('girls :>> ', girls);
            console.log('boys :>> ', boys);


            // insert boys
            boys = boys.reverse();
            const boys_insert_to = document.querySelector("#boys");
            setClassrecord(boys_insert_to, boys, crd);

            // insert girls
            girls = girls.reverse();
            const girls_insert_to = document.querySelector("#girls");
            setClassrecord(girls_insert_to, girls, crd);

        } catch (e) {
            console.log(e);
        }

    });

    function setClassrecordDetail(crd){
            console.log('crd :>> ', crd);

            const highestWritten = document.querySelectorAll('.highestWritten');
            const highestPerformance = document.querySelectorAll('.highestPerformance');

            highestWritten[0].value = crd.hw1;
            highestWritten[1].value = crd.hw2;
            highestWritten[2].value = crd.hw3;
            highestWritten[3].value = crd.hw4;
            highestWritten[4].value = crd.hw5;
            highestWritten[5].value = crd.hw6;
            highestWritten[6].value = crd.hw7;
            highestWritten[7].value = crd.hw8;
            highestWritten[8].value = crd.hw9;
            highestWritten[9].value = crd.hw10;

            highestPerformance[0].value = crd.hp1;
            highestPerformance[1].value = crd.hp2;
            highestPerformance[2].value = crd.hp3;
            highestPerformance[3].value = crd.hp4;
            highestPerformance[4].value = crd.hp5;
            highestPerformance[5].value = crd.hp6;
            highestPerformance[6].value = crd.hp7;
            highestPerformance[7].value = crd.hp8;
            highestPerformance[8].value = crd.hp9;
            highestPerformance[9].value = crd.hp10;
            $(".highestQuarterly").val(crd.hq1);
            document.querySelector("body").dataset.crd_id = crd.id;


            $("#crd_total_written").html(crd.total_written);
            $("#crd_ps_written").html(100);
            $("#crd_ws_written").html(crd.written_weight+"%");

            $("#crd_total_performance").html(crd.total_performance);
            $("#crd_ps_performance").html(100);
            $("#crd_ws_performance").html(crd.performance_weight+"%");

            $("#written_weight").val(crd.written_weight);
            $("#performance_weight").val(crd.performance_weight);
            $("#quarterly_weight").val(crd.quarterly_weight);

            $("#crd_ws_quarterly").html(crd.quarterly_weight+"%")
        }

        function setClassrecord(insert_to, students, crd) {
            
            students.forEach((stud, index) => {
                const written_total = Number(stud.w1) + Number(stud.w2) + Number(stud.w3) + Number(stud.w4) + Number(stud.w5) + Number(stud.w6) + Number(stud.w7) + Number(stud.w8) + Number(stud.w9) + Number(stud.w10);
                const written_PS = crd.total_written ? (written_total/crd.total_written * 100).toFixed(2) : 0;
                const written_WS = (written_PS * (Number(crd.written_weight)/100)).toFixed(2);

                const performance_total = Number(stud.p1) + Number(stud.p2) + Number(stud.p3) + Number(stud.p4) + Number(stud.p5) + Number(stud.p6) + Number(stud.p7) + Number(stud.p8) + Number(stud.p9) + Number(stud.p10);
                const performance_PS = crd.total_performance ? (performance_total/crd.total_performance * 100).toFixed(2) : 0;
                const performance_WS = (performance_PS * (Number(crd.performance_weight)/100)).toFixed(2);

                const quarterly_total = Number(stud.q1);
                const quarterly_PS = Number(crd.hq1) ? (quarterly_total/Number(crd.hq1) * 100).toFixed(2) : 0;
                const quarterly_WS = (quarterly_PS * (Number(crd.quarterly_weight)/100)).toFixed(2);

                let initial_grade = (Number(written_WS) + Number(performance_WS) + Number(quarterly_WS)).toFixed(2);
                const final = transmutation_table(initial_grade);

                const tr = document.createElement('tr');
                tr.classList.add('cr_data');
                tr.dataset.cr_id = stud.classrecord_id;
                tr.innerHTML = `
                    <td>${students.length-index}</td>
                    <td>${stud.student_name}</td>

                    <!--Written Works-->
                    <td><input type='number' value="${stud.w1}" style='width: 20px' class='form-control form-control-sm form-control-plaintext written_data'></td>
                    <td><input type='number' value="${stud.w2}" style='width: 20px' class='form-control form-control-sm form-control-plaintext written_data'></td>
                    <td><input type='number' value="${stud.w3}" style='width: 20px' class='form-control form-control-sm form-control-plaintext written_data'></td>
                    <td><input type='number' value="${stud.w4}" style='width: 20px' class='form-control form-control-sm form-control-plaintext written_data'></td>
                    <td><input type='number' value="${stud.w5}" style='width: 20px' class='form-control form-control-sm form-control-plaintext written_data'></td>
                    <td><input type='number' value="${stud.w6}" style='width: 20px' class='form-control form-control-sm form-control-plaintext written_data'></td>
                    <td><input type='number' value="${stud.w7}" style='width: 20px' class='form-control form-control-sm form-control-plaintext written_data'></td>
                    <td><input type='number' value="${stud.w8}" style='width: 20px' class='form-control form-control-sm form-control-plaintext written_data'></td>
                    <td><input type='number' value="${stud.w9}" style='width: 20px' class='form-control form-control-sm form-control-plaintext written_data'></td>
                    <td><input type='number' value="${stud.w10}" style='width: 20px' class='form-control form-control-sm form-control-plaintext written_data'></td>
                    <td>${written_total}</td>
                    <td>${written_PS}</td>
                    <td>${written_WS}</td>

                    <!--Perfomance Task-->
                    <td><input type='number' value="${stud.p1}" style='width: 20px' class='form-control form-control-sm form-control-plaintext performance_data'></td>
                    <td><input type='number' value="${stud.p2}" style='width: 20px' class='form-control form-control-sm form-control-plaintext performance_data'></td>
                    <td><input type='number' value="${stud.p3}" style='width: 20px' class='form-control form-control-sm form-control-plaintext performance_data'></td>
                    <td><input type='number' value="${stud.p4}" style='width: 20px' class='form-control form-control-sm form-control-plaintext performance_data'></td>
                    <td><input type='number' value="${stud.p5}" style='width: 20px' class='form-control form-control-sm form-control-plaintext performance_data'></td>
                    <td><input type='number' value="${stud.p6}" style='width: 20px' class='form-control form-control-sm form-control-plaintext performance_data'></td>
                    <td><input type='number' value="${stud.p7}" style='width: 20px' class='form-control form-control-sm form-control-plaintext performance_data'></td>
                    <td><input type='number' value="${stud.p8}" style='width: 20px' class='form-control form-control-sm form-control-plaintext performance_data'></td>
                    <td><input type='number' value="${stud.p9}" style='width: 20px' class='form-control form-control-sm form-control-plaintext performance_data'></td>
                    <td><input type='number' value="${stud.p10}" style='width: 20px' class='form-control form-control-sm form-control-plaintext performance_data'></td>
                    <td>${performance_total}</td>
                    <td>${performance_PS}</td>
                    <td>${performance_WS}</td>

                    <!--Quarterly Assessment-->
                    <td><input type='number' value="${stud.q1}" style='width: 43px' class='form-control form-control-sm form-control-plaintext quarterly_data'></td>
                    <td>${quarterly_PS}</td>
                    <td>${quarterly_WS}</td>
                    <td>${initial_grade}</td>
                    <td>${final}</td>
                `;
                insert_to.insertAdjacentElement('afterend', tr);
                })
        }

        function transmutation_table(initial_grade){
            let transmuted_grade;

            if(initial_grade == 100){
                transmuted_grade = 100;
            } else if (initial_grade < 99.99 && initial_grade > 98.40){
                transmuted_grade = 99;
            }  else if (initial_grade < 98.39 && initial_grade > 96.80){
                transmuted_grade = 98;
            }  else if (initial_grade < 96.79 && initial_grade > 95.20){
                transmuted_grade = 97;
            }  else if (initial_grade < 95.19 && initial_grade > 93.60){
                transmuted_grade = 96;
            }  else if (initial_grade < 93.59 && initial_grade > 92.00){
                transmuted_grade = 95;
            }  else if (initial_grade < 91.99 && initial_grade > 90.40){
                transmuted_grade = 94;
            } else if (initial_grade < 88.80 && initial_grade > 90.39){
                transmuted_grade = 93;
            } else if (initial_grade < 87.20 && initial_grade > 88.79){
                transmuted_grade = 92;
            } else if (initial_grade < 87.19 && initial_grade > 85.60){
                transmuted_grade = 91;
            } else if (initial_grade < 85.59 && initial_grade > 84.000){
                transmuted_grade = 90;
            } else if (initial_grade < 83.99 && initial_grade > 82.40){
                transmuted_grade = 89;
            } else if (initial_grade < 82.39 && initial_grade > 80.80){
                transmuted_grade = 88;
            } else if (initial_grade < 80.79 && initial_grade > 79.20){
                transmuted_grade = 87;
            } else if (initial_grade < 79.19 && initial_grade > 77.60){
                transmuted_grade = 86;
            } else if (initial_grade < 77.59 && initial_grade > 76.00){
                transmuted_grade = 85;
            } else if (initial_grade < 75.99 && initial_grade > 74.40){
                transmuted_grade = 84;
            } else if (initial_grade < 74.39 && initial_grade > 72.80){
                transmuted_grade = 83;
            } else if (initial_grade < 72.79 && initial_grade > 71.20){
                transmuted_grade = 82;
            } else if (initial_grade < 71.19 && initial_grade > 69.60){
                transmuted_grade = 81;
            } else if (initial_grade < 69.59 && initial_grade > 68.00){
                transmuted_grade = 80;
            } else if (initial_grade < 67.99 && initial_grade > 66.40){
                transmuted_grade = 79;
            } else if (initial_grade < 66.39 && initial_grade > 64.80){
                transmuted_grade = 78;
            } else if (initial_grade < 64.79 && initial_grade > 63.20){
                transmuted_grade = 77;
            } else if (initial_grade < 63.19 && initial_grade > 61.60){
                transmuted_grade = 76;
            } else if (initial_grade < 61.59 && initial_grade > 60.00){
                transmuted_grade = 75;
            } else if (initial_grade < 59.99 && initial_grade > 56.00){
                transmuted_grade = 74;
            } else if (initial_grade < 55.99 && initial_grade > 52.00){
                transmuted_grade = 73;
            } else if (initial_grade < 51.99 && initial_grade > 48.00){
                transmuted_grade = 72;
            } else if (initial_grade < 47.99 && initial_grade > 44.00){
                transmuted_grade = 71;
            } else if (initial_grade < 43.99 && initial_grade > 40.00){
                transmuted_grade = 70;
            } else if (initial_grade < 39.99 && initial_grade > 36.00){
                transmuted_grade = 69;
            } else if (initial_grade < 35.99 && initial_grade > 32.00){
                transmuted_grade = 68;
            } else if (initial_grade < 31.99 && initial_grade > 28.00){
                transmuted_grade = 67;
            } else if (initial_grade < 27.99 && initial_grade > 24.00){
                transmuted_grade = 66;
            } else if (initial_grade < 23.99 && initial_grade > 16.00){
                transmuted_grade = 65;
            } else if (initial_grade < 19.99 && initial_grade > 20.00){
                transmuted_grade = 64;
            } else if (initial_grade < 15.99 && initial_grade > 12.00){
                transmuted_grade = 63;
            } else if (initial_grade < 11.99 && initial_grade > 8.00){
                transmuted_grade = 62;
            } else if (initial_grade < 7.99 && initial_grade > 4.00){
                transmuted_grade = 61;
            } else if (initial_grade < 3.99 && initial_grade > 0){
                transmuted_grade = 60;
            } else {
                transmuted_grade = 0;
            }
            return transmuted_grade
        }

        async function update(){

            // classrecord details 
            const highestWritten = document.querySelectorAll('.highestWritten');
            const highestPerformance = document.querySelectorAll('.highestPerformance');
            
            let classrecord_detail = {
                "id": document.querySelector("body").dataset.crd_id,
                "written_weight": $("#written_weight").val(),
                "performance_weight":  $("#performance_weight").val(),
                "quarterly_weight": $("#quarterly_weight").val(),
                "hq1":  $(".highestQuarterly").val(),
                "hw1": highestWritten[0].value,
                "hw2": highestWritten[1].value,
                "hw3": highestWritten[2].value,
                "hw4": highestWritten[3].value,
                "hw5": highestWritten[4].value,
                "hw6": highestWritten[5].value,
                "hw7": highestWritten[6].value,
                "hw8": highestWritten[7].value,
                "hw9": highestWritten[8].value,
                "hw10": highestWritten[9].value,
                "hp1": highestPerformance[0].value,
                "hp2": highestPerformance[1].value,
                "hp3": highestPerformance[2].value,
                "hp4": highestPerformance[3].value,
                "hp5": highestPerformance[4].value,
                "hp6": highestPerformance[5].value,
                "hp7": highestPerformance[6].value,
                "hp8": highestPerformance[7].value,
                "hp9": highestPerformance[8].value,
                "hp10": highestPerformance[9].value
            };


            try {

                // update crd
                let res = await axios.put('http://localhost/teachers-toolkit-app/server/api/classrecord_detail/update.php',  classrecord_detail );
                console.log(res.data);


                // update cr
                const trs = document.querySelectorAll('[data-cr_id]');
                let array = [];
                let item;
                trs.forEach(async tr => { 
                    console.log(tr);
                    const written_data = document.querySelectorAll(`[data-cr_id = "${tr.dataset.cr_id}"] > td > input.written_data`);
                    const performance_data = document.querySelectorAll(`[data-cr_id = "${tr.dataset.cr_id}"] > td > input.performance_data`);
                    const quarterly_score = $(`[data-cr_id = "${tr.dataset.cr_id}"] > td > input.quarterly_data`).val() ;
                    item = {
                        "id": tr.dataset.cr_id,
                        "w1" : written_data[0].value,
                        "w2" : written_data[1].value,
                        "w3" : written_data[2].value,
                        "w4" : written_data[3].value,
                        "w5" : written_data[4].value,
                        "w6" : written_data[5].value,
                        "w7" : written_data[6].value,
                        "w8" : written_data[7].value,
                        "w9" : written_data[8].value,
                        "w10" : written_data[9].value,
                        "p1" : performance_data[0].value,
                        "p2" : performance_data[1].value,
                        "p3" : performance_data[2].value,
                        "p4" : performance_data[3].value,
                        "p5" : performance_data[4].value,
                        "p6" : performance_data[5].value,
                        "p7" : performance_data[6].value,
                        "p8" : performance_data[7].value,
                        "p9" : performance_data[8].value,
                        "p10" : performance_data[9].value,
                        "q1" : quarterly_score
                    }
                    let res = await axios.put('http://localhost/teachers-toolkit-app/server/api/classrecord/update.php', item);
                    console.log(res.data);
                });

                location.reload();

            } catch (e) {
                console.log(e);
            }

        }

    </script>
</body>
</html>