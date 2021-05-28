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
                <span id="subject_name"></span>
                <p class="font-small" id="semester"></p>
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
                            
                            <!--  Data -->

                            <!-- FEMALES -->
                            <tr id="girls">
                                <th disabled class="table-active">Female</th>
                                <?php
                                    for ($row=0; $row < 3; $row++) { 
                                        echo "<th disabled class='table-active'>";
                                    }
                                ?>
                            </tr>
                            <!--  Data -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables.min.js"></script>

    <script src="../grades/Grade.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>

    document.addEventListener("DOMContentLoaded", async () => { 
        $('#grading_table').DataTable({
            bLengthChange: false,
            bPaginate: false,
            bInfo: false,
            ordering: false,
            searching: false

        });
        $('.dataTables_length').addClass('bs-select');

        const urlParams = new URLSearchParams(window.location.search);
        const subject_assignment_id = urlParams.get('subject_assignment_id');
        const subject_id = urlParams.get('subject_id');

        let grade, tr, insert_to
        if (subject_assignment_id == null) {
            location.href = './home.php';
        }

        try {

            // read this subject
            let res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/subject/read_one.php?id=${subject_id}`)
            let subject = res.data;
            console.log('subject :>> ', subject);
            $('#subject_name').html(subject.subject_name)
            let str
            if (subject.semester == 1) {
                str = "1st Semester"
            } else {
                str = "2nd Semester"
            }
            $('#semester').html(str)

            // ---------------------quarter 1
            // classrecord detail
            res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord_detail/read_by_subject_assignment.php?subject_assignment_id=${subject_assignment_id}&quarter=1`);
            let q1_crd = res.data;
            q1_crd.total_highest_written = Number(q1_crd.hw1) + Number(q1_crd.hw2) + Number(q1_crd.hw3) + Number(q1_crd.hw4) + Number(q1_crd.hw5) + Number(q1_crd.hw6) + Number(q1_crd.hw7) + Number(q1_crd.hw8) + Number(q1_crd.hw9) + Number(q1_crd.hw10);
            q1_crd.total_highest_performance = Number(q1_crd.hp1) + Number(q1_crd.hp2) + Number(q1_crd.hp3) + Number(q1_crd.hp4) + Number(q1_crd.hp5) + Number(q1_crd.hp6) + Number(q1_crd.hp7) + Number(q1_crd.hp8) + Number(q1_crd.hp9) + Number(q1_crd.hp10);
            console.log('q1_crd :>> ', q1_crd);

            // classrecord
            res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord/read_by_subject_assignment.php?subject_assignment_id=${subject_assignment_id}&quarter=1`);
            let q1_scores = res.data.data;
            console.log('q1_scores :>> ', q1_scores);


            // -------------------quarter 2
            // classrecord detail
            res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord_detail/read_by_subject_assignment.php?subject_assignment_id=${subject_assignment_id}&quarter=2`);
            let q2_crd = res.data;
            q2_crd.total_highest_written = Number(q2_crd.hw1) + Number(q2_crd.hw2) + Number(q2_crd.hw3) + Number(q2_crd.hw4) + Number(q2_crd.hw5) + Number(q2_crd.hw6) + Number(q2_crd.hw7) + Number(q2_crd.hw8) + Number(q2_crd.hw9) + Number(q2_crd.hw10);
            q2_crd.total_highest_performance = Number(q2_crd.hp1) + Number(q2_crd.hp2) + Number(q2_crd.hp3) + Number(q2_crd.hp4) + Number(q2_crd.hp5) + Number(q2_crd.hp6) + Number(q2_crd.hp7) + Number(q2_crd.hp8) + Number(q2_crd.hp9) + Number(q2_crd.hp10);
            console.log('q2_crd :>> ', q2_crd);

            // classrecord
            res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord/read_by_subject_assignment.php?subject_assignment_id=${subject_assignment_id}&quarter=2`);
            let q2_scores = res.data.data;
            console.log('q2_scores :>> ', q2_scores);


            // divide by gender
            let boys = [], girls = [];
            q1_scores.forEach((stud, index) => {
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
            setTable(boys_insert_to, boys, q2_scores, q1_crd);

            // insert girls
            girls = girls.reverse();
            const girls_insert_to = document.querySelector("#girls");
            setTable(girls_insert_to, girls, q2_scores, q2_crd);

        } catch(e){
            console.log(e);
        }
    });


    function setTable(insert_to, q1_data, q2_data, crd){
        let q1_grade, q2_grade, tr
        q1_data.forEach((stud, index) => {

            q1_grade = calculateGrade(q1_data[index], crd);
            q2_grade = calculateGrade(q2_data[index], crd);
            tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${stud.student_name}</td>
                <td>${q1_grade.final.toFixed(2)}</td>
                <td>${q2_grade.final.toFixed(2)}</td>
                <td>${((q1_grade.final+q2_grade.final)/2).toFixed(2)}</td>
            `;
            insert_to.insertAdjacentElement('afterend', tr);
        })
    }
    </script>
</body>
</html>