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
        .table{
            transform: scale(0.95);
        }
        #subject_name {
            text-transform: capitalize;
            font-style: italic;
        }
    </style>
</head>
<body>
    <?php include '../partials/header_teacher.php'; ?>

    <h3 class="text-center mt-4 mb-0">
        Report Data
        <a type="button" href="subject_lists.php" class="btn-floating blue">
            <i class="far fa-hand-point-left" aria-hidden="true"></i>
        </a>
    </h3>
    <div class="container mt-4">
        <ul class="nav md-pills nav-justified pills-success-color-dark mb-4">
            <li class="nav-item pl-0">
                <a class="nav-link active " data-toggle="tab" href="#highest_grade" role="tab">
                <i class="fas fa-user-graduate mr-1 fa-lg"></i><i class="fas fa-angle-double-up mr-2 fa-sm"></i>
                Students Highest Grade</a>
            </li>
            <li class="nav-item pl-0">
                <a class="nav-link" data-toggle="tab" href="#lowest_grade" role="tab">
                <i class="fas fa-user-graduate mr-1 fa-lg"></i><i class="fas fa-angle-double-down mr-2 fa-sm"></i>
                Students Lowest Grade</a>
            </li>
        </ul>

        <div class="tab-content mb-4">
        
            <!--Panel Highest Grade-->
            <div class="tab-pane fade in show active" id="highest_grade" role="tabpanel">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg mt-0">
                    <h2 class="text-center mt-0 mb-4 pt-0">
                        Students
                    </h2>
                    <table id="highest" class="table table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">1st Quarter Grade</th>
                                <th class="th-sm">2nd Quarter Grade</th>
                                <th class="th-sm">Final Grade</th>
                            </tr>
                        </thead>
                        <tbody id="insert_to_highest">
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!--Panel Lowest Grade-->
            <div class="tab-pane fade" id="lowest_grade" role="tabpanel">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg mt-0">
                    <h2 class="text-center mt-0 mb-4 pt-0">
                        Students
                    </h2>
                    <table id="lowest" class="table table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">1st Quarter Grade</th>
                                <th class="th-sm">2nd Quarter Grade</th>
                                <th class="th-sm">Final Grade</th>
                            </tr>
                        </thead>
                        <tbody id="insert_to_lowest">
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="report_events" role="tabpanel">
            </div>

        </div>

    </div>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../grades/Grade.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>


        document.addEventListener("DOMContentLoaded", async () => { 




            const urlParams = new URLSearchParams(window.location.search);
            const subject_assignment_id = urlParams.get('subject_assignment_id');
            const subject_id = urlParams.get('subject_id');

            let grade, tr, insert_to
            if (subject_assignment_id == null) {
                location.href = './home.php';
            }

            try {
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

                // insert 
                const insert_to_highest = document.querySelector("#insert_to_highest");
                setGrades(insert_to_highest, q1_scores, q2_scores, q1_crd);


            } catch(e){
                console.log(e);
            }
        });


        function setGrades(insert_to, q1_data, q2_data, crd){
            let q1_grade, q2_grade, tr
            let new_data = [], temp = {}
            q1_data.forEach((stud, index) => {

                temp = {};

                q1_grade = calculateGrade(q1_data[index], crd);
                q2_grade = calculateGrade(q2_data[index], crd);

                temp.student_name = stud.student_name
                temp.q1_grade = q1_grade.final
                temp.q2_grade = q2_grade.final
                temp.final_grade = (q1_grade.final + q2_grade.final) / 2
                
                new_data.push(temp);
            })
            
            // lowest to highest
            new_data.sort(function(a, b){
                return a.final_grade - b.final_grade
            });

            // highest to lowest
            let high = [...new_data];
            high.sort(function(a, b){
                return  b.final_grade - a.final_grade
            });

            // insert highest
            const insert_to_highest = document.querySelector("#insert_to_highest")
            insertToTable(insert_to_highest, high)

            // insert lowest
            const insert_to_lowest = document.querySelector("#insert_to_lowest")
            insertToTable(insert_to_lowest, new_data)


        }

        function insertToTable(insert_to, array) {
            let tr
            array.forEach(data => {
                tr = document.createElement('tr')
                tr.innerHTML = `
                <td class="td-sm">${data.student_name}</td>
                <td class="td-sm">${data.q1_grade}</td>
                <td class="td-sm">${data.q2_grade}</td>
                <td class="td-sm">${data.final_grade}</td>
                `;
                insert_to.appendChild(tr)
            })
        }




    </script>
</body>
</html>