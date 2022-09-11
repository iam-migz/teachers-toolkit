<?php include "../partials/admin_head.inc.php"; ?>
<!-- MDBootstrap Datatables  -->
<link href="../mdb/css/addons/datatables.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
.register-container{
  background-color: white;
  margin: 0 auto;
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
.radio_btns{
  text-align: center;
}
#error-msg {
  color: red;
}
</style>
</head>
<body>
  <?php include "../partials/admin_nav.inc.php"; ?>
  <div class="container mt-5 mb-5">
    <!-- Nav Pills -->
    <div class="card">
      <ul class="nav md-pills nav-justified" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-teacher-tab" data-toggle="pill" href="#teacher-section" role="tab" aria-controls="pills-teacher" aria-selected="false">
            <span class="nav-link_text">
              <img src="../images/student.png" class="pr-3" style="height: 40px" alt="student">
              Teacher
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-student-tab" data-toggle="pill" href="#student-section" role="tab" aria-controls="pills-student" aria-selected="false">
            <span class="nav-link_text">
              <img src="../images/teacher.png" class="pr-3" style="height: 40px" alt="student">
              Student
            </span>
          </a>
        </li>
      </ul>
      <!--End of Nav Pills-->
      <hr>

      <!-- Tab panes -->
      <div class="pl-3 pr-3 pb-0 pt-0 tab-content" id="pills-tabContent">
        <!--Teacher Section-->
        <div class="tab-pane fade show active" id="teacher-section" role="tabpanel">
          <form id="teacher-form">
            <div class="register-container">    
              <div class="register-title">
                <h1 class="display-4">Create Teacher</h1>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col">
                    <input id="t_firstname" class="form-control" type="text" placeholder="Enter First Name" name="firstname" required>
                  </div>
                  <div class="col">
                    <input id="t_middlename" class="form-control" type="text" placeholder="Enter Middle Name" name="middlename" required>
                  </div>
                  <div class="col">
                    <input id="t_lastname" class="form-control" type="text" placeholder="Enter Last Name" name="lastname" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <input class="form-control" type="email" placeholder="Enter Email" name="email" id="t_email" required>
              </div>

              <div class="form-group">
                <input class="form-control" type="number" placeholder="Enter Phone Number" name="phone_no" id="t_phone_no" required>
              </div>

              <div id="error-msg"></div>
              <div class="modal-footer">
                <button id="teacherSubmit" data-dismiss="modal" class="btn btn-dark-green submit-modify mr-1">Create</button>
                <a class="btn btn-blue submit-modify ml-1" href="home.php" role="button">Cancel</a>
              </div>
            </div>
          </form>
        </div>
        <!--End Teacher Section-->

        <!--Student Section-->
        <div class="tab-pane fade" id="student-section" role="tabpanel" aria-labelledby="pills-student-tab">
          <form>
            <div class="register-container">    
              <div class="register-title">
                <h1 class="display-4">Create Student</h1>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col">
                    <input id="s_firstname" class="form-control" type="text" placeholder="Enter First Name" name="firstname" required>
                  </div>
                  <div class="col">
                    <input id="s_middlename" class="form-control" type="text" placeholder="Enter Middle Name" name="middlename" required>
                  </div>
                  <div class="col">
                    <input id="s_lastname" class="form-control" type="text" placeholder="Enter Last Name" name="lastname" required>
                  </div>
                </div>
              </div>
              <div class="form-group radio_btns">
                <div class="form-row">
                  <div class="col-8">
                    <input id="s_email" class="form-control" type="text" placeholder="Enter E-mail Address" name="email" required>
                  </div>
                  <div class="col">
                    <label class="mb-0 ml-2" for="material-url">Gender: </label>
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" id="s_male" name="gender" checked>
                      <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" id="s_female" name="gender">
                      <label class="form-check-label" for="female">Female</label>
                    </div>
                  </div>
                </div>  
              </div>
              <div class="form-group">
                <input id="s_LRN" class="form-control" type="number" placeholder="Enter LRN" name="LRN" required>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <div class="md-form mt-0">
                        <input type="text" class="form-control" placeholder="City" id="s_city">
                    </div>
                  </div>

                  <div class="col">
                    <div class="md-form mt-0">
                      <input type="text" class="form-control" placeholder="Province" id="s_province">
                    </div>
                  </div>
                  <div class="col">
                    <div class="md-form mt-0">
                      <input type="text" class="form-control" placeholder="Barangay" id="s_barangay">
                    </div>
                  </div>
                </div>
              </div>
              <div class="md-form md-outline input-with-post-icon datepicker">
                <input placeholder="Select date" type="date" id="s_birthdate" class="form-control">
                <label for="example" class="text-muted" style="font-weight: 400">Enter Birthdate</label>
              </div>
              
              <div id="error-msg"></div>
              <div class="modal-footer">
                <button id="studentSubmit" data-dismiss="modal" class="btn btn-dark-green submit-modify mr-1">Create</button>
                <a class="btn btn-blue submit-modify ml-1" href="home.php" role="button">Cancel</a>
              </div>
            </div>
          </form>
        </div>
        <!--End of Student Sections-->

      </div> <!--End of Tab Panels-->
    </div>
  </div>

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
    <span id="toast-message"></span>
  </div> 
</div>

<script type="text/javascript">

const toastHTMLElement = document.getElementById("EpicToast");
const toastBody = document.getElementById("toast-message");
const toastElement = new bootstrap.Toast(toastHTMLElement, {
  animation: true,
  delay: 3500
});

$('.datepicker').datepicker({
  inline: true
});

const school_id = <?php echo $_SESSION["school_id"]; ?>;
const errorDiv = document.querySelector("#error-msg");
const studentSubmit = document.querySelector('#studentSubmit');
const teacherSubmit = document.querySelector('#teacherSubmit');

studentSubmit.addEventListener("click", async (x) => {
  x.preventDefault();
  const firstname = document.querySelector("#s_firstname").value;
  const lastname = document.querySelector("#s_lastname").value;
  const middlename = document.querySelector("#s_middlename").value;
  const email = document.querySelector("#s_email").value;
  const province = document.querySelector("#s_province").value;
  const city = document.querySelector("#s_city").value;
  const barangay = document.querySelector("#s_barangay").value;
  const LRN = document.querySelector("#s_LRN").value;
  const birthdate = document.querySelector("#s_birthdate").value;
  const male = document.querySelector("#s_male");
  const female = document.querySelector("#s_female");

  let gender;
  if (male.checked) {
    gender = 'm';
  } else if (female.checked) {
    gender = 'f';
  }

  if (
    firstname == '' || 
    middlename == '' || 
    lastname == '' || 
    email == '' || 
    province == '' || 
    city == '' || 
    barangay == '' || 
    LRN == '' 
  ){
    errorDiv.innerHTML = "please complete the form";
    return;
  }

  try {
    let res = await axios.post('http://localhost/teachers-toolkit-app/server/student/create',{
      school_id, firstname, lastname, middlename, email, province, city, barangay, gender, LRN, birthdate
    });
    let data = res.data;
    if (res.data.result) {
      document.querySelector("#s_firstname").value = '';
      document.querySelector("#s_lastname").value = '';
      document.querySelector("#s_middlename").value = '';
      document.querySelector("#s_email").value = '';
      document.querySelector("#s_province").value = '';
      document.querySelector("#s_city").value = '';
      document.querySelector("#s_barangay").value = '';
      document.querySelector("#s_LRN").value = '';
      document.querySelector("#s_birthdate").value = '';
      
      toastBody.innerHTML = "Student Successfully Created";
      toastElement.show();
    }
    console.log(data);
  } catch (e) {
    console.log(e);
  }
});


teacherSubmit.addEventListener("click", async (x) => {
  x.preventDefault();
  const firstname = document.querySelector("#t_firstname").value;
  const lastname = document.querySelector("#t_lastname").value;
  const middlename = document.querySelector("#t_middlename").value;
  const phone_no = document.querySelector("#t_phone_no").value;
  const email = document.querySelector("#t_email").value;

  if (
    firstname == '' || 
    lastname == '' || 
    middlename == '' || 
    phone_no == '' ||
    email == ''
  ){
    errorDiv.innerHTML = "please complete the form";
    return;
  }

  try {
    let res = await axios.post('http://localhost/teachers-toolkit-app/server/teacher/create',{
      school_id, firstname, lastname, middlename, phone_no, email
    });
    let data = res.data;
    if (res.data.result) {
      document.querySelector("#t_firstname").value = '';
      document.querySelector("#t_lastname").value = '';
      document.querySelector("#t_middlename").value = '';
      document.querySelector("#t_phone_no").value = '';
      document.querySelector("#t_email").value = '';
      toastBody.innerHTML = "Teacher Successfully Created";
      toastElement.show();
    }
    console.log(data);
  } catch (e) {
    console.log(e);
  }
});
</script>
</body>
</html>