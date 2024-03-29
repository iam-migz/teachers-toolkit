<?php include '../../partials/admin_head.inc.php'; ?>

<!-- DataTables Select CSS -->
<link href="../../mdb/css/addons/datatables-select2.min.css" rel="stylesheet">

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
</style>
<script>
    const school_id = <?php echo $_SESSION['school_id']; ?>;
    axios.get(`http://localhost/teachers-toolkit-app/server/teacher/findBySchoolId/${school_id}`)
        .then(res => {
            if (res.data.result == 0) {
                return;
            }
            let teachers = res.data.data;
            console.log(teachers);
            const select = document.querySelector("#advisor_id");
            for(teach of teachers) {
                select.options[select.options.length] = new Option(teach.firstname+' '+teach.lastname, teach.id); 
            }

        })
        .catch(err => console.log(err));
</script>
</head>
<body>
    
    <?php include '../../partials/admin_nav.inc.php'; ?>
    
    <form>
        <div class="register-container">    
            <div class="register-title">
                <h1 class="display-4">Create Section</h1>
            </div>
            <div class="form-group">
                <div class="md-form">
                    <input type="text" id="section_name" name="section_name" placeholder="Enter Section Name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-7">
                        <select class="mdb-select md-form colorful-select dropdown-primary" searchable="Search Advisor.." id="advisor_id">
                            <!-- data from db -->
                        </select>
                        <label class="mdb-main-label">Select Advisor</label>
                    </div>
                    <div class="col">
                        <select class="mdb-select md-form colorful-select dropdown-primary" id="track">
                            <option value="Academic" selected>Academic</option>
                            <option value="Technical-Vocational-Livelihood">Technical-Vocational-Livelihood</option>
                            <option value="Sports and Arts">Sports and Arts</option>
                        </select>
                        <label class="mdb-main-label">Select Track</label>
                    </div>
                </div>

            </div>
            <div class="form-group">
                
                <div class="form-row">
                    <div class="col">
                        <select class="mdb-select md-form colorful-select dropdown-primary" searchable="Search Strand.." id="strand">
                            <option value="Humanities and Social Sciences">Humanities and Social Sciences</option>
                            <option value="Science, Technology, Engineering and Mathematics">Science, Technology, Engineering and Mathematics</option>
                            <option value="Accountancy, Business and Management">Accountancy, Business and Management</option>
                            <option value="General Academic">General Academic</option>
                            <option value="Information and Communications Technology">Information and Communications Technology</option>
                            <option value="Home Economics">Home Economics</option>
                            <option value="Agri-Fishery Arts">Agri-Fishery Arts</option>
                            <option value="Sports">Sports</option>
                            <option value="Arts and Design">Arts and Design</option>
                        </select>
                        <label class="mdb-main-label">Select Strand</label>
                    </div>

                    <div class="col">
                        <select class="mdb-select md-form colorful-select dropdown-primary" id="grade">
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        <label class="mdb-main-label">Select Grade Year</label>
                    </div>
                </div>
            </div>

            <div id="error-msg"></div>
            <div class="modal-footer">
                <button id="submit" data-dismiss="modal" class="btn btn-dark-green submit-modify">Create Section</button>
                <a class="btn btn-grey submit-modify ml-1" href="./sy_home.php?<?php echo $_SERVER['QUERY_STRING'];?>" role="button">Back</a>
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
            Section Successfully Created.
        </div> 
    </div>
        
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        //Range
        $(document).ready(function() {
            const $valueSpan = $('.valueSpan2');
            const $value = $('#num_hours');
            $valueSpan.html($value.val());
            $value.on('input change', () => {
                $valueSpan.html($value.val());
            });
        });
        
        //Select
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });

        document.querySelector("#submit").addEventListener("click", async (x) => {
            x.preventDefault();

            const advisor_id = document.querySelector("#advisor_id").value;
            const section_name = document.querySelector("#section_name").value;
            const strand = document.querySelector("#strand").value;
            const track = document.querySelector("#track").value;
            const grade = document.querySelector("#grade").value;
            const errDiv = document.querySelector("#error-msg");

            if (advisor_id == '' || section_name == '' || strand == '' || track == '' || grade == '') {
                errDiv.innerHTML = "Please Complete the form";
                return;
            }
            // get sy_id from query params
            const urlParams = new URLSearchParams(window.location.search);
            const sy_id = urlParams.get('sy_id');
            console.log('sy_id :>> ', sy_id);

            try {
                console.log({advisor_id, section_name, strand, track, grade});
                let res = await axios.post('http://localhost/teachers-toolkit-app/server/section/create',{
                    'school_year_id': sy_id, advisor_id, section_name, strand, track, grade
                });
                let data = res.data;
                if (res.data.result) {
                    document.querySelector("#section_name").value = '';
                    errDiv.innerHTML = "";
                    var option = {
                        animation: true,
                        delay: 3500
                    };   
                    var toastHTMLElement = document.getElementById("EpicToast");
                    var toastElement = new bootstrap.Toast(toastHTMLElement, option);
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