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
        #subject_name {
            font-style: italic;
        }
    </style>
</head>
<body>
    <?php include '../partials/header_teacher.php'; ?>

    <h3 class="text-center mt-4 mb-0">
        Second Quarter Grade Sheet <br>
        <span id="subject_name"></span>
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
    <button type="button" class="btn btn-primary" onclick="update()">Update</button>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables.min.js"></script>
    <script src="../grades/Grade.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>

    document.addEventListener("DOMContentLoaded", async () => { 
        const urlParams = new URLSearchParams(window.location.search);
        const subject_assignment_id = urlParams.get('subject_assignment_id');
        const subject_id = urlParams.get('subject_id');

        if (subject_assignment_id == null) {
            location.href = './home.php';
        }

        // get subject
        axios.get(`http://localhost/teachers-toolkit-app/server/api/subject/read_one.php?id=${subject_id}`)
            .then(res => {
                if (res.data.result == 0){
                    return;
                }
                const subject = res.data;
                $("#subject_name").html(subject.subject_name);
                console.log('subject :>> ', subject);


            })
            .catch(err => console.log(err));


        try {
            // set classrecord detail
            let res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord_detail/read_by_subject_assignment.php?subject_assignment_id=${subject_assignment_id}&quarter=2`);
            let crd = res.data;
            crd.total_highest_written = Number(crd.hw1) + Number(crd.hw2) + Number(crd.hw3) + Number(crd.hw4) + Number(crd.hw5) + Number(crd.hw6) + Number(crd.hw7) + Number(crd.hw8) + Number(crd.hw9) + Number(crd.hw10);
            crd.total_highest_performance = Number(crd.hp1) + Number(crd.hp2) + Number(crd.hp3) + Number(crd.hp4) + Number(crd.hp5) + Number(crd.hp6) + Number(crd.hp7) + Number(crd.hp8) + Number(crd.hp9) + Number(crd.hp10);
            setClassrecordDetail(crd);



            // set classrecord
            res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord/read_by_subject_assignment.php?subject_assignment_id=${subject_assignment_id}&quarter=2`);
            if(res.data.result == 0) return;
            let students = res.data.data;
            students = students.filter(stud => stud.quarter == 2)
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


            $("#crd_total_written").html(crd.total_highest_written);
            $("#crd_ps_written").html(100);
            $("#crd_ws_written").html(crd.written_weight+"%");

            $("#crd_total_performance").html(crd.total_highest_performance);
            $("#crd_ps_performance").html(100);
            $("#crd_ws_performance").html(crd.performance_weight+"%");

            $("#written_weight").val(crd.written_weight);
            $("#performance_weight").val(crd.performance_weight);
            $("#quarterly_weight").val(crd.quarterly_weight);

            $("#crd_ws_quarterly").html(crd.quarterly_weight+"%")
        }

        function setClassrecord(insert_to, students, crd) {
            
            students.forEach((stud, index) => {

                const grade = calculateGrade(stud, crd);

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
                    <td>${grade.written_total.toFixed(2)}</td>
                    <td>${grade.written_PS.toFixed(2)}</td>
                    <td>${grade.written_WS.toFixed(2)}</td>

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
                    <td>${grade.performance_total.toFixed(2)}</td>
                    <td>${grade.performance_PS.toFixed(2)}</td>
                    <td>${grade.performance_WS.toFixed(2)}</td>

                    <!--Quarterly Assessment-->
                    <td><input type='number' value="${stud.q1}" style='width: 43px' class='form-control form-control-sm form-control-plaintext quarterly_data'></td>
                    <td>${grade.quarterly_PS.toFixed(2)}</td>
                    <td>${grade.quarterly_WS.toFixed(2)}</td>
                    <td>${grade.initial_grade.toFixed(2)}</td>
                    <td>${grade.final.toFixed(2)}</td>
                `;
                insert_to.insertAdjacentElement('afterend', tr);
                })
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