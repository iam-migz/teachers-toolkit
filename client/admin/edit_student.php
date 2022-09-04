<?php include '../partials/admin_head.inc.php'; ?>
<style>
    body{
        margin-bottom: 5%;
    }
    .register-container{
        padding-top: 10%; 
        background-color: white;
        margin: 2% auto;
        width: 66%;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 10px 20px;
    }
    .register-title{
        text-align: center;
        margin-bottom: 30px;
    }
    .display-4{
        font-size: 40px;
    }
    .submit-modify{
        font-size: 20px;
        width: 48%;
        padding: 11px;
        border-radius: 10px;
    }
    #error-msg {
        color: red;
    }
    .radio_btns{
        text-align: center;
    }
</style>
</head>
<body>
    <?php include '../partials/admin_nav.inc.php'; ?>
    <form>
        <div class="register-container">    
            <div class="register-title">
                <h1 class="display-4">Update Student</h1>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <input id="firstname" class="form-control" type="text" placeholder="Update First Name" name="firstname" required>
                    </div>
                    <div class="col">
                        <input id="middlename" class="form-control" type="text" placeholder="Update Middle Name" name="middlename" required>
                    </div>
                    <div class="col">
                        <input id="lastname" class="form-control" type="text" placeholder="Update Last Name" name="lastname" required>
                    </div>
                </div>
            </div>
            <div class="form-group radio_btns">
                <div class="form-row">
                    <div class="col-8">
                        <input id="email" class="form-control" type="text" placeholder="Update E-mail Address" name="email" required>
                    </div>
                    <div class="col">
                        <label class="mb-0 ml-2" for="material-url">Gender: </label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="male" name="gender" checked>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="female" name="gender">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="form-group">
                <input id="LRN" class="form-control" type="number" placeholder="Update LRN" name="LRN" required>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <div class="md-form mt-0 md-0">
                            <input type="text" class="form-control" placeholder="Update City" id="city">
                        </div>
                    </div>

                    <div class="col">
                        <div class="md-form mt-0 md-0">
                            <input type="text" class="form-control" placeholder="Update Province" id="province">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form mt-0 md-0">
                            <input type="text" class="form-control" placeholder="Update Barangay" id="barangay">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="md-form md-outline input-with-post-icon datepicker mt-0">
                    <input placeholder="Select date" type="date" id="birthdate" class="form-control">
                    <label for="example" class="text-muted" style="font-weight: 400">Update Birthdate</label>
                </div>
            </div>
            
            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label>Continuing Status:</label>
                        <div class="switch">
                            <label class="text-center">
                                <input type="checkbox" id="continuing">
                                <span class="lever"></span> 
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <label>Completed Status:</label>
                        <div class="switch">
                            <label class="text-center">
                                <input type="checkbox" id="completed">
                                <span class="lever"></span> 
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="error-msg"></div>
            <div class="modal-footer">
                <button id="submit" data-dismiss="modal" class="btn btn-dark-green submit-modify mr-1">Update</button>
                <a class="btn btn-blue submit-modify ml-1" href="viewTeachers_Students.php" role="button">Cancel</a>
            </div>
        </div>
    </form>

    <!-- TOAST -->
    <div class="toast" id="EpicToast" role="alert" aria-live="assertive" aria-atomic="true" style="position:absolute; top: 80px; right: 40px;">
        <div class="toast-header">
            <strong class="mr-auto">Notification</strong>
            <small>Teachers Toolkit</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Student Account Successfully Updated.
        </div> 
    </div>
        
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">

        const firstname = document.querySelector("#firstname");       
        const lastname = document.querySelector("#lastname");
        const middlename = document.querySelector("#middlename");
        const email = document.querySelector("#email");
        const province = document.querySelector("#province");
        const city = document.querySelector("#city");
        const barangay = document.querySelector("#barangay");
        const LRN = document.querySelector("#LRN");
        const birthdate = document.querySelector("#birthdate");

        const continuing = document.querySelector("#continuing");
        const completed = document.querySelector("#completed");

        const male = document.querySelector("#male");
        const female = document.querySelector("#female");
        let gender;



        // get student_id from query params
        const urlParams = new URLSearchParams(window.location.search);
        const student_id = urlParams.get('student_id');
        console.log('student_id :>> ', student_id);

        axios.get(`http://localhost/teachers-toolkit-app/server/student/findOne/${student_id}`)
            .then(res => {
                if (res.data.result == 0) {
                    return;
                }
                let student = res.data.data
                firstname.value = student.firstname;
                middlename.value = student.middlename;
                lastname.value = student.lastname;
                email.value = student.email;
                LRN.value = student.LRN;
                city.value = student.city;
                province.value = student.province;
                barangay.value = student.barangay;
                birthdate.value = student.birthdate;
                continuing.checked = (student.continuing == '1') ? 1 : 0;
                completed.checked = (student.completed == '1') ? 1 : 0;

            })
            .catch(err => console.log(err));

        const errorDiv = document.querySelector("#error-msg");
        document.querySelector("#submit").addEventListener("click", (x) => {
            x.preventDefault();

            if (male.checked) {
                gender = 'm'    ;
            } else if (female.checked) {
                gender = 'f';
            }
            let continue_val = continuing.checked ? 1 : 0;
            let completed_val = completed.checked ? 1 : 0;

            console.log({
                "id": student_id,
                "continuing": continue_val,
                "completed": completed_val,
                "firstname": firstname.value,
                "lastname": lastname.value,
                "middlename": middlename.value,
                "email": email.value,
                "province": province.value,
                "city": city.value,
                "barangay": barangay.value,
                "gender": gender,
                "LRN": LRN.value,
                "birthdate": birthdate.value
            });
            if (firstname.value == '' || middlename.value == '' || lastname.value == '' || email.value == '' || 
                province.value == '' || city.value == '' || barangay.value == '' || LRN.value == '' ){
                errorDiv.innerHTML = "please complete the form";
                return;
            }


            axios.put('http://localhost/teachers-toolkit-app/server/student/update', {
                "id": student_id,
                "continuing": continue_val,
                "completed": completed_val,
                "firstname": firstname.value,
                "lastname": lastname.value,
                "middlename": middlename.value,
                "email": email.value,
                "province": province.value,
                "city": city.value,
                "barangay": barangay.value,
                "gender": gender,
                "LRN": LRN.value,
                "birthdate": birthdate.value
            })
            .then(res => {
                if (res.data.result) {
                    location.reload();
                } else {
                    errorDiv.innerHTML = res.data.message;
                }
            })
            .catch(err => console.log(err));

        });

    </script>
</body>
</html>