<?php include '../../partials/admin_head.inc.php'; ?>

<!-- MDBootstrap Datatables  -->
<link href="../../mdb/css/addons/datatables.min.css" rel="stylesheet">    
<!-- DataTables Select CSS -->
<link href="../../mdb/css/addons/datatables-select2.min.css" rel="stylesheet">


<style>
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
    bottom: .5em;
    }
</style>
</head>
<body>
    <?php include '../../partials/admin_nav.inc.php'; ?>
    <div class="container mt-4 mb-5">
        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
                view students by section
            </h3>
            <div class="card-body">
                <div class="form-group mb-0">
                    <select class="mdb-select md-form colorful-select dropdown-primary " searchable="Search Section.." id="section">
                    <option value="Grade Section" disabled selected>Grade Section</option>
                        <!-- data -->
                    </select>
                    <label class="mdb-main-label">Select Section</label>
                </div>
                <h5 class="text-center text-uppercase py-4 mt-0 mb-0">
                    Student List
                </h5>
                <div class="table-responsive-sm table-responsive-md table-responsive-lg mt-0">
                    <table id="assign_stud" class="table table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Student ID</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">LRN</th>
                            </tr>
                        </thead>
                        <tbody id="insert_to">
                            <!-- <tr>
                                <td>1927</td>
                                <td>Hill, Grace</td>
                                <td>19273</td>
                            </tr> -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    <button type="button" id="submit" class="btn btn-rounded btn-outline-primary btn-block btn-md waves-effect m-auto">
                                    <i class="far fa-eye pr-2" aria-hidden="true"></i>
                                             View Students
                                    </button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <a class="btn btn-grey submit-modify ml-1" href="./sy_home.php?<?php echo $_SERVER['QUERY_STRING'];?>" role="button">Back</a>
            </div>
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
            Subject Successfully Assigned to a Section.
        </div> 
    </div>

    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../../mdb/js/addons/datatables.min.js"></script>
    <!-- DataTables Select JS -->
    <script src="../../mdb/js/addons/datatables-select2.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //select
            $('.mdb-select').materialSelect();

            // $('#assign_stud').DataTable();
            // $('.dataTables_length').addClass('bs-select');
            // //add classes
            // $('#assign_stud_wrapper').find('label').each(function () {
            //     $(this).parent().append($(this).children());
            // });
            // $('#assign_stud_wrapper .dataTables_filter').find('input').each(function () {
            //     const $this = $(this);
            //     $this.attr("placeholder", "Search..");
            //     $this.removeClass('form-control-sm');
            // });
            // $('#assign_stud_wrapper .dataTables_length').addClass('d-flex flex-row');
            // $('#assign_stud_wrapper .dataTables_filter').addClass('md-form mt-3');
            // $('#assign_stud_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
            // $('#assign_stud_wrapper select').addClass('mdb-select colorful-select dropdown-primary');
            // $('#assign_stud_wrapper .mdb-select').materialSelect();
            // $('#assign_stud_wrapper .dataTables_filter').find('label').remove();
        });

        // get sy_id from query params
        const urlParams = new URLSearchParams(window.location.search);
        const sy_id = urlParams.get('sy_id');
        console.log('sy_id :>> ', sy_id);

        // set sections
        axios.get(`http://localhost/teachers-toolkit-app/server/section/findBySYID/${sy_id}`)
            .then(res => {
                let sections = res.data.data;
                console.log('sections', sections);
                const select = document.querySelector("#section");
                for(sec of sections) {
                    select.options[select.options.length] = new Option(sec.section_name, sec.id); 
                }
            })
            .catch(err => console.log(err));


        // set student

            $('#submit').on("click",function(){
                
                const section_id = $("#section").val()
                axios.get(`http://localhost/teachers-toolkit-app/server/studentassign/findBySectionId/${section_id}`)
                    .then(res => {
                        if (res.data.result == 0) {
                            return;
                        }
                        const students = res.data.data;
                        console.log('students', students);
                        const insert_to = document.querySelector("#insert_to");
                        insert_to.innerHTML = '';
                        students.forEach((stud, index) => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td>${stud.id}</td>
                                <td>${stud.student_name}</td>
                                <td>${stud.LRN}</td>`;
                            insert_to.appendChild(tr);
                        });
                        
                    })
                    .catch(err => console.log(err))
            })




    </script>
</body>
</html>