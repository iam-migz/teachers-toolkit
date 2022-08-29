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
        Report Data <br>
        <span id="subject_name"></span>
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
                res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/grades/subject_grades.php?subject_assignment_id=${subject_assignment_id}`)
                let grades = res.data


                let new_grades = []
                grades.forEach((elem, index) => {
                    if (elem.quarter == 2) return
                    let temp = {}
                    temp.student_name = grades[index].student_name
                    temp.q1_grade = grades[index].final_grade
                    temp.q2_grade = grades[index+1].final_grade
                    temp.final = (temp.q1_grade + temp.q2_grade)/2
                    new_grades.push(temp)
                })
                console.log('new_grades :>> ', new_grades);
                

                // lowest to highest
                new_grades.sort(function(a, b){
                    return a.final - b.final
                });

                // highest to lowest
                let high = [...new_grades];
                high.sort(function(a, b){
                    return  b.final - a.final
                });
                console.log('new_grades :>> ', new_grades);
                console.log('high :>> ', high);


                // insert highest
                const insert_to_highest = document.querySelector("#insert_to_highest")
                insertToTable(insert_to_highest, high)

                // insert lowest
                const insert_to_lowest = document.querySelector("#insert_to_lowest")
                insertToTable(insert_to_lowest, new_grades)

            } catch(e){
                console.log(e);
            }
        });


        function insertToTable(insert_to, array) {
            let tr
            array.forEach(data => {
                tr = document.createElement('tr')
                tr.innerHTML = `
                <td class="td-sm">${data.student_name}</td>
                <td class="td-sm">${data.q1_grade}</td>
                <td class="td-sm">${data.q2_grade}</td>
                <td class="td-sm">${data.final}</td>
                `;
                insert_to.appendChild(tr)
            })
        }




    </script>
</body>
</html>