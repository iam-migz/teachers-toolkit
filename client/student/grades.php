<?php include "../partials/student_head.inc.php"; ?>

<!-- MDBootstrap Cards Extended Pro  -->
<link href="../mdb/css/addons-pro/cards-extended.min.css" rel="stylesheet">
<!-- MDBootstrap Datatables  -->
<link href="../mdb/css/addons/datatables.min.css" rel="stylesheet">
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
    <?php include "../partials/student_nav.inc.php"; ?>

    <div class="container mt-5 mb-5">
        <div class="card">
            <h2 class="text-center mt-4 mb-4">
                <span id="strand_name"></span>
                Grade of <span id="student_name"></span>
            </h2>
            <table class="table">

                <!-- grade 11 -->
                <thead class="thead-dark">
                    <tr>
                        <th colspan="4" class="font-weight-bold">Grade 11 First Semester</th>
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
                        <th colspan="4" class="font-weight-bold">Grade 11 Second Semester</th>
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
                        <th colspan="4" class="font-weight-bold">Grade 12 First Semester</th>
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
                        <th colspan="4" class="font-weight-bold">Grade 12 Second Semester</th>
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
    <script src="../grades/Grade.js"></script>
    <script>
      // TODO: query grades by school year
      
        $('#grading_table').DataTable({
            "bLengthChange": false,
            "searching": false,
            "bPaginate": false,
            "bInfo": false,
            "ordering": false
        });
        $('.dataTables_length').addClass('bs-select');

        let student_id = <?php echo $_SESSION["account_id"]; ?>;
        document.addEventListener("DOMContentLoaded", async () => { 

            try {

                let res = await axios.get(`http://localhost/teachers-toolkit-app/server/student/findOne/${student_id}`)
                let this_student = res.data.data;
                console.log('this_student :>> ', this_student);
                $("#student_name").html(this_student.firstname +" " +this_student.middlename + " "+this_student.lastname)

                res = await axios.get(`http://localhost/teachers-toolkit-app/server/grade/getStudentGrades/${student_id}`)
                let student_data = res.data.data;
                console.log('student_data :>> ', student_data);

                // divide by school year id
                let grade11 = [], grade12 = []
                let temp = student_data[0].sy_id; 
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


                let insert_to = document.querySelector("#grade11_sem1")
                insertToTable(grade11_sem1, insert_to)

                insert_to = document.querySelector("#grade11_sem2")
                insertToTable(grade11_sem2, insert_to)


                // ------ grade 12 -------

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


                insert_to = document.querySelector("#grade12_sem1")
                insertToTable(grade12_sem1, insert_to)

                insert_to = document.querySelector("#grade12_sem2")
                insertToTable(grade12_sem2, insert_to)



            } catch(e) {
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
                    <th scope="row">${data[index].subject_name}</th>
                    <td>${data[index].final_grade}</td>
                    <td>${data[index+1].final_grade}</td>
                    <td>${(data[index].final_grade + data[index+1].final_grade) / 2}</td>
                `;
                insert_to.appendChild(tr);
                
            })
        }



    </script>
</body>
</html>