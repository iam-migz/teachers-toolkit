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
        #subject_name {
            font-style: italic;
        }
    </style>
</head>
<body>
    <?php include '../partials/header_teacher.php'; ?>

    <div class="container mt-5">
        <div class="card">
            <h2 class="text-center mt-4 mb-0">
                Summary Grades <br>
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

            res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/grades/subject_grades.php?subject_assignment_id=${subject_assignment_id}`)
            let grades = res.data
            console.log('grades :>> ', grades);

            // insert 
            const grades_insert_to = document.querySelector("#student_field");
            insertToTable(grades, grades_insert_to);



        } catch(e){
            console.log(e);
        }
    });

    function insertToTable(data, insert_to){
            let tr
            data.forEach((elem, index) => {
                if (elem.quarter == 2){
                    return
                }
                tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${data[index].student_name}</td>
                    <td>${data[index].final_grade}</td>
                    <td>${data[index+1].final_grade}</td>
                    <td>${(data[index].final_grade + data[index+1].final_grade) / 2}</td>
                `;
                insert_to.insertAdjacentElement('afterend', tr);
                
            })
        }

    </script>
</body>
</html>