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
        .stud_name_set{
            font-size: 18px;
        }
        .semester {
            font-style: italic;
        }
    </style>
</head>
<body>
    <?php include '../partials/header_student.php'; ?>

    <div class="container mt-5">
        <div class="card">
            <h2 class="text-center mt-4 mb-0">
                <span id="strand_name">Technical-Vocational-Livelihood</span>
            </h2>
            <table class="table">

                <!-- grade 11 -->
                <thead class="thead-dark">
                    <tr>
                        <th colspan="4">Grade 11 First Semester</th>
                    </tr>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">First Quarter</th>
                        <th scope="col">Second Quarter</th>
                        <th scope="col">Final</th>
                    </tr>
                </thead>
                <tbody id="grade11_sem1">
                    <!-- insert data here -->
                </tbody>

                <thead class="thead-dark">
                    <tr>
                        <th colspan="4">Grade 11 Second Semester</th>
                    </tr>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">First Quarter</th>
                        <th scope="col">Second Quarter</th>
                        <th scope="col">Final</th>
                    </tr>
                </thead>
                <tbody id="grade11_sem2">
                    <!-- insert data here -->
                </tbody>


                <!-- grade 12 -->
                <thead class="thead-dark">
                    <tr>
                        <th colspan="4">Grade 12 First Semester</th>
                    </tr>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">First Quarter</th>
                        <th scope="col">Second Quarter</th>
                        <th scope="col">Final</th>
                    </tr>
                </thead>
                <tbody id="grade12_sem1">
                    <!-- insert data here -->
                </tbody>

                <thead class="thead-dark">
                    <tr>
                        <th colspan="4">Grade 12 Second Semester</th>
                    </tr>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">First Quarter</th>
                        <th scope="col">Second Quarter</th>
                        <th scope="col">Final</th>
                    </tr>
                </thead>
                <tbody id="grade12_sem2">
                    <!-- insert data here -->
                </tbody>







                </table>
        </div>
    </div>

    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../grades/Grade.js"></script>
    <script>
        $('#grading_table').DataTable({
            "bLengthChange": false,
            "searching": false,
            "bPaginate": false,
            "bInfo": false,
            "ordering": false
        });
        $('.dataTables_length').addClass('bs-select');

        let student_id = <?php echo $_SESSION['account_id']; ?>;
        document.addEventListener("DOMContentLoaded", async () => { 

            let res, temp, tr, grade11 = [], grade12 = []
            let q1_grade, q2_grade, q1_crd, q2_crd
            try {
                res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord/read_student_grades.php?student_id=${student_id}`)
                let student_data = res.data.data;
                console.log('student_data :>> ', student_data);

                // divide by school year id
                temp = student_data[0].sy_id; 
                student_data.forEach(data => {
                    if(data.sy_id == temp) {
                        grade11.push(data)
                    } else {
                        grade12.push(data)
                    }
                })
                console.log('grade11 :>> ', grade11);
                console.log('grade12 :>> ', grade12);


                // ------ grade 11 -------

                // divide grade 11 data to 2 semester
                let grade11_sem1 = [], grade11_sem2 = []
                grade11.forEach(data => {
                    if (data.semester == 1) {
                        grade11_sem1.push(data)
                    } else if (data.semester == 2) {
                        grade11_sem2.push(data)
                    }
                })
                console.log('grade11_sem1 :>> ', grade11_sem1);
                console.log('grade11_sem2 :>> ', grade11_sem2);

                // insert grade 11 sem 1
                let grade11_sem1_insert_to = document.querySelector("#grade11_sem1");
                grade11_sem1.forEach(async(data, index) => {

                    if (data.quarter == 2){
                        return;
                    }
                    // get classrecord detail quarter 1
                    res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord_detail/read_by_subject_assignment.php?subject_assignment_id=${data.subject_assignment_id}&quarter=1`);
                    q1_crd = res.data;
                    q1_crd.total_highest_written = Number(q1_crd.hw1) + Number(q1_crd.hw2) + Number(q1_crd.hw3) + Number(q1_crd.hw4) + Number(q1_crd.hw5) + Number(q1_crd.hw6) + Number(q1_crd.hw7) + Number(q1_crd.hw8) + Number(q1_crd.hw9) + Number(q1_crd.hw10);
                    q1_crd.total_highest_performance = Number(q1_crd.hp1) + Number(q1_crd.hp2) + Number(q1_crd.hp3) + Number(q1_crd.hp4) + Number(q1_crd.hp5) + Number(q1_crd.hp6) + Number(q1_crd.hp7) + Number(q1_crd.hp8) + Number(q1_crd.hp9) + Number(q1_crd.hp10);
                    
                    // get classrecord detail quarter 2
                    res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord_detail/read_by_subject_assignment.php?subject_assignment_id=${data.subject_assignment_id}&quarter=2`);
                    q2_crd = res.data;
                    q2_crd.total_highest_written = Number(q2_crd.hw1) + Number(q2_crd.hw2) + Number(q2_crd.hw3) + Number(q2_crd.hw4) + Number(q2_crd.hw5) + Number(q2_crd.hw6) + Number(q2_crd.hw7) + Number(q2_crd.hw8) + Number(q2_crd.hw9) + Number(q2_crd.hw10);
                    q2_crd.total_highest_performance = Number(q2_crd.hp1) + Number(q2_crd.hp2) + Number(q2_crd.hp3) + Number(q2_crd.hp4) + Number(q2_crd.hp5) + Number(q2_crd.hp6) + Number(q2_crd.hp7) + Number(q2_crd.hp8) + Number(q2_crd.hp9) + Number(q2_crd.hp10);


                    // calculate grade
                    console.log('index :>> ', index);
                    q1_grade = calculateGrade(grade11_sem1[index], q1_crd)
                    q2_grade = calculateGrade(grade11_sem1[index+1], q2_crd)
                    
                    console.log('q1_grade :>> ', q1_grade);
                    console.log('q2_grade :>> ', q2_grade);

                    tr = document.createElement('tr');
                    tr.innerHTML = `
                        <th scope="row">${data.subject_name}</th>
                        <td>${q1_grade.final}</td>
                        <td>${q2_grade.final}</td>
                        <td>${(q1_grade.final + q2_grade.final) / 2}</td>
                    `;
                    grade11_sem1_insert_to.appendChild(tr);
                })

                // insert grade 11 sem 2
                let grade11_sem2_insert_to = document.querySelector("#grade11_sem2");
                grade11_sem2.forEach(async(data, index) => {

                    if (data.quarter == 2){
                        return;
                    }
                    // get classrecord detail quarter 1
                    res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord_detail/read_by_subject_assignment.php?subject_assignment_id=${data.subject_assignment_id}&quarter=1`);
                    q1_crd = res.data;
                    q1_crd.total_highest_written = Number(q1_crd.hw1) + Number(q1_crd.hw2) + Number(q1_crd.hw3) + Number(q1_crd.hw4) + Number(q1_crd.hw5) + Number(q1_crd.hw6) + Number(q1_crd.hw7) + Number(q1_crd.hw8) + Number(q1_crd.hw9) + Number(q1_crd.hw10);
                    q1_crd.total_highest_performance = Number(q1_crd.hp1) + Number(q1_crd.hp2) + Number(q1_crd.hp3) + Number(q1_crd.hp4) + Number(q1_crd.hp5) + Number(q1_crd.hp6) + Number(q1_crd.hp7) + Number(q1_crd.hp8) + Number(q1_crd.hp9) + Number(q1_crd.hp10);
                    
                    // get classrecord detail quarter 2
                    res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord_detail/read_by_subject_assignment.php?subject_assignment_id=${data.subject_assignment_id}&quarter=2`);
                    q2_crd = res.data;
                    q2_crd.total_highest_written = Number(q2_crd.hw1) + Number(q2_crd.hw2) + Number(q2_crd.hw3) + Number(q2_crd.hw4) + Number(q2_crd.hw5) + Number(q2_crd.hw6) + Number(q2_crd.hw7) + Number(q2_crd.hw8) + Number(q2_crd.hw9) + Number(q2_crd.hw10);
                    q2_crd.total_highest_performance = Number(q2_crd.hp1) + Number(q2_crd.hp2) + Number(q2_crd.hp3) + Number(q2_crd.hp4) + Number(q2_crd.hp5) + Number(q2_crd.hp6) + Number(q2_crd.hp7) + Number(q2_crd.hp8) + Number(q2_crd.hp9) + Number(q2_crd.hp10);


                    // calculate grade
                    console.log('index :>> ', index);
                    q1_grade = calculateGrade(grade11_sem2[index], q1_crd)
                    q2_grade = calculateGrade(grade11_sem2[index+1], q2_crd)
                    
                    console.log('q1_grade :>> ', q1_grade);
                    console.log('q2_grade :>> ', q2_grade);

                    tr = document.createElement('tr');
                    tr.innerHTML = `
                        <th scope="row">${data.subject_name}</th>
                        <td>${q1_grade.final}</td>
                        <td>${q2_grade.final}</td>
                        <td>${(q1_grade.final + q2_grade.final) / 2}</td>
                    `;
                    grade11_sem2_insert_to.appendChild(tr);
                })   



                //  ------ grade 12 -------

                // divide grade 12 data to 2 semester
                let grade12_sem1 = [], grade12_sem2 = []

                grade12.forEach(data => {
                    if (data.semester == 1) {
                        grade12_sem1.push(data)
                    } else if (data.semester == 2) {
                        grade12_sem2.push(data)
                    }
                })
                console.log('grade12_sem1 :>> ', grade12_sem1);
                console.log('grade12_sem2 :>> ', grade12_sem2);

                // insert grade 12 sem 1
                let grade12_sem1_insert_to = document.querySelector("#grade12_sem1");
                grade12_sem1.forEach(async(data, index) => {

                    if (data.quarter == 2){
                        return;
                    }
                    // get classrecord detail quarter 1
                    res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord_detail/read_by_subject_assignment.php?subject_assignment_id=${data.subject_assignment_id}&quarter=1`);
                    q1_crd = res.data;
                    q1_crd.total_highest_written = Number(q1_crd.hw1) + Number(q1_crd.hw2) + Number(q1_crd.hw3) + Number(q1_crd.hw4) + Number(q1_crd.hw5) + Number(q1_crd.hw6) + Number(q1_crd.hw7) + Number(q1_crd.hw8) + Number(q1_crd.hw9) + Number(q1_crd.hw10);
                    q1_crd.total_highest_performance = Number(q1_crd.hp1) + Number(q1_crd.hp2) + Number(q1_crd.hp3) + Number(q1_crd.hp4) + Number(q1_crd.hp5) + Number(q1_crd.hp6) + Number(q1_crd.hp7) + Number(q1_crd.hp8) + Number(q1_crd.hp9) + Number(q1_crd.hp10);
                    
                    // get classrecord detail quarter 2
                    res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord_detail/read_by_subject_assignment.php?subject_assignment_id=${data.subject_assignment_id}&quarter=2`);
                    q2_crd = res.data;
                    q2_crd.total_highest_written = Number(q2_crd.hw1) + Number(q2_crd.hw2) + Number(q2_crd.hw3) + Number(q2_crd.hw4) + Number(q2_crd.hw5) + Number(q2_crd.hw6) + Number(q2_crd.hw7) + Number(q2_crd.hw8) + Number(q2_crd.hw9) + Number(q2_crd.hw10);
                    q2_crd.total_highest_performance = Number(q2_crd.hp1) + Number(q2_crd.hp2) + Number(q2_crd.hp3) + Number(q2_crd.hp4) + Number(q2_crd.hp5) + Number(q2_crd.hp6) + Number(q2_crd.hp7) + Number(q2_crd.hp8) + Number(q2_crd.hp9) + Number(q2_crd.hp10);


                    // calculate grade
                    console.log('index :>> ', index);
                    q1_grade = calculateGrade(grade12_sem1[index], q1_crd)
                    q2_grade = calculateGrade(grade12_sem1[index+1], q2_crd)
                    
                    console.log('q1_grade :>> ', q1_grade);
                    console.log('q2_grade :>> ', q2_grade);

                    tr = document.createElement('tr');
                    tr.innerHTML = `
                        <th scope="row">${data.subject_name}</th>
                        <td>${q1_grade.final}</td>
                        <td>${q2_grade.final}</td>
                        <td>${(q1_grade.final + q2_grade.final) / 2}</td>
                    `;
                    grade12_sem1_insert_to.appendChild(tr);
                })

                // insert grade 12 sem 2
                let grade12_sem2_insert_to = document.querySelector("#grade12_sem2");
                grade12_sem2.forEach(async(data, index) => {

                    if (data.quarter == 2){
                        return;
                    }
                    // get classrecord detail quarter 1
                    res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord_detail/read_by_subject_assignment.php?subject_assignment_id=${data.subject_assignment_id}&quarter=1`);
                    q1_crd = res.data;
                    q1_crd.total_highest_written = Number(q1_crd.hw1) + Number(q1_crd.hw2) + Number(q1_crd.hw3) + Number(q1_crd.hw4) + Number(q1_crd.hw5) + Number(q1_crd.hw6) + Number(q1_crd.hw7) + Number(q1_crd.hw8) + Number(q1_crd.hw9) + Number(q1_crd.hw10);
                    q1_crd.total_highest_performance = Number(q1_crd.hp1) + Number(q1_crd.hp2) + Number(q1_crd.hp3) + Number(q1_crd.hp4) + Number(q1_crd.hp5) + Number(q1_crd.hp6) + Number(q1_crd.hp7) + Number(q1_crd.hp8) + Number(q1_crd.hp9) + Number(q1_crd.hp10);
                    
                    // get classrecord detail quarter 2
                    res = await axios.get(`http://localhost/teachers-toolkit-app/server/api/classrecord_detail/read_by_subject_assignment.php?subject_assignment_id=${data.subject_assignment_id}&quarter=2`);
                    q2_crd = res.data;
                    q2_crd.total_highest_written = Number(q2_crd.hw1) + Number(q2_crd.hw2) + Number(q2_crd.hw3) + Number(q2_crd.hw4) + Number(q2_crd.hw5) + Number(q2_crd.hw6) + Number(q2_crd.hw7) + Number(q2_crd.hw8) + Number(q2_crd.hw9) + Number(q2_crd.hw10);
                    q2_crd.total_highest_performance = Number(q2_crd.hp1) + Number(q2_crd.hp2) + Number(q2_crd.hp3) + Number(q2_crd.hp4) + Number(q2_crd.hp5) + Number(q2_crd.hp6) + Number(q2_crd.hp7) + Number(q2_crd.hp8) + Number(q2_crd.hp9) + Number(q2_crd.hp10);


                    // calculate grade
                    console.log('index :>> ', index);
                    q1_grade = calculateGrade(grade12_sem2[index], q1_crd)
                    q2_grade = calculateGrade(grade12_sem2[index+1], q2_crd)
                    
                    console.log('q1_grade :>> ', q1_grade);
                    console.log('q2_grade :>> ', q2_grade);

                    tr = document.createElement('tr');
                    tr.innerHTML = `
                        <th scope="row">${data.subject_name}</th>
                        <td>${q1_grade.final}</td>
                        <td>${q2_grade.final}</td>
                        <td>${(q1_grade.final + q2_grade.final) / 2}</td>
                    `;
                    grade12_sem2_insert_to.appendChild(tr);
                })   



            } catch(e) {
                console.log(e);
            }
        });




    </script>
</body>
</html>