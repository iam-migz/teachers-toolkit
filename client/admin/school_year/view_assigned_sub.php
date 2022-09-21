<?php include '../../partials/admin_head.inc.php'; ?>
<!-- MDBootstrap Datatables  -->
<link href="../../mdb/css/addons/datatables.min.css" rel="stylesheet">

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
    <div class="container mt-4">
        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
                View Assigned Subjects 
            </h3>
            <div class="card-body">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg">
                    <table id="view_assigned" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Section Name</th>
                                <th class="th-sm">Grade Year</th>
                                <th class="th-sm">Subject Name</th>
                                <th class="th-sm">Assigned Teacher</th>
                            </tr>
                        </thead>
                        <tbody id="insert_to">
                        </tbody>
                    </table>
                </div>
                <a class="btn btn-grey submit-modify ml-1" href="./sy_home.php?<?php echo $_SERVER['QUERY_STRING'];?>" role="button">Back</a>
            </div>
        </div>
    </div>

    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../../mdb/js/addons/datatables.min.js"></script>
    <script type="text/javascript">

        // get sy_id from query params
        const urlParams = new URLSearchParams(window.location.search);
        const sy_id = urlParams.get('sy_id');
        console.log('sy_id :>> ', sy_id);

        axios.get(`http://localhost/teachers-toolkit-app/server/subjectassign/findBySYID/${sy_id}`)
            .then(res => {
                if (res.data.result == 0) {
                    // display no data found
                    return;
                }
                let data = res.data.data;
                const insert_to = document.querySelector("#insert_to");
                console.log(data);
                data.forEach(elem => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                    <td>${elem.section_name}</td>
                    <td>${elem.grade}</td>
                    <td>${elem.subject_name}</td>
                    <td>${elem.teacher_name}</td>`;
                    insert_to.appendChild(tr);
                });
                $('#view_assigned').DataTable();
                $('.dataTables_length').addClass('bs-select');
                $('#view_assigned_wrapper').find('label').each(function () {
                    $(this).parent().append($(this).children());
                });
                $('#view_assigned_wrapper .dataTables_filter').find('input').each(function () {
                    const $this = $(this);
                    $this.attr("placeholder", "Search..");
                    $this.removeClass('form-control-sm');
                });
                $('#view_assigned_wrapper .dataTables_length').addClass('d-flex flex-row');
                $('#view_assigned_wrapper .dataTables_filter').addClass('md-form mt-3');
                $('#view_assigned_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
                $('#view_assigned_wrapper select').addClass('mdb-select colorful-select dropdown-primary');
                $('#view_assigned_wrapper .mdb-select').materialSelect();
                $('#view_assigned_wrapper .dataTables_filter').find('label').remove();  
            })
            .catch(err => console.log(err));



    </script>
</body>
</html>