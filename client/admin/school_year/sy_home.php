<?php include '../../partials/admin_head.inc.php'; ?>

<style>
.gradient-custom-assigned_stud{
    background: #f6d365;
    background: -webkit-linear-gradient(to right, rgba(235, 187, 167, 0.5), rgba(207, 199, 248, 1));
    background: linear-gradient(to right, rgba(235, 187, 167, 0.5), rgba(207, 199, 248, 1))
}
.gradient-custom-view_sub{
    background: #f6d365;
    background: -webkit-linear-gradient(to right, rgba(102, 126, 234, 0.5), rgba(118, 75, 162, 1));
    background: linear-gradient(to right, rgba(102, 126, 234, 0.5), rgba(118, 75, 162, 1))
}
.title{
    font-size:22px;
}
</style>
</head>
<body>
    <?php include '../../partials/admin_nav.inc.php'; ?>
    <div class="container">
        <h1 class="mt-4">School Year <span id="schoolyear"></span></h1>
        <div class="row mb-5 d-flex justify-content-center">
            <div class="col-lg-4 mt-4 mr-0 ml-0 box_card"> 
                <div class="card testimonial-card">
                    <div class="card-up purple-gradient lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/subject.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Create a Subject</h4>
                        <a type="button" id="create_subject" class="btn-floating light-green"><i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mt-4 mr-0 ml-0 box_card">
                <div class="card testimonial-card">
                    <div class="card-up peach-gradient lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/section.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Create a Section</h4>
                        <a type="button" id="create_section" class="btn-floating light-green"><i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 mr-0 ml-0 box_card">
                <div class="card testimonial-card">
                    <div class="card-up blue-gradient lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/stud_assign.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Assign Student to Section</h4>
                        <a type="button" id="assign_stud" class="btn-floating light-green"><i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mr-0 ml-0 box_card">
                <div class="card testimonial-card">
                    <div class="card-up aqua-gradient lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/assign.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Assign Subject to Section</h4>
                        <a type="button" id="assign_subject" class="btn-floating light-green"><i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mt-4 mr-0 ml-0 box_card">
                <div class="card testimonial-card">
                    <div class="card-up gradient-custom-view_sub lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/view.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">View Section Subjects</h4>
                        <a type="button" id="view_assigned_sub" class="btn-floating light-green"><i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mr-0 ml-0 box_card">
                <div class="card testimonial-card">
                    <div class="card-up gradient-custom-assigned_stud lighten-1"></div>
                    <div class="avatar mx-auto white">
                        <img src="../../images/view_assigned_stud.png" class="rounded-circle" alt="woman avatar">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">View Section Students</h4>
                        <a type="button" id="view_assigned_stud" class="btn-floating light-green"><i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script type="text/javascript">

        // get sy_id from query params
        const urlParams = new URLSearchParams(window.location.search);
        const sy_id = urlParams.get('sy_id');
        console.log('sy_id :>> ', sy_id);
        document.addEventListener('DOMContentLoaded', async () => {
            try {
                const res = await axios.get(`http://localhost/teachers-toolkit-app/server/schoolyear/findOne/${sy_id}`);
                if (res.data.result === 1) {
                    const data = res.data.data;
                    const year = data.sy_start.split('-')[0];
                    const sy_span = document.querySelector('#schoolyear');
                    sy_span.innerText = year;
                }
            } catch (err) {
                console.log(err);
            }
        });
        
        if (sy_id == null || sy_id == '') {
            location.href = `../home.php`;
        }

        const create_section = document.querySelector("#create_section");
        const create_subject = document.querySelector("#create_subject");
        const assign_subject = document.querySelector("#assign_subject");
        const view_assigned_sub = document.querySelector("#view_assigned_sub");
        const assign_stud = document.querySelector("#assign_stud");
        const view_assigned_stud = document.querySelector("#view_assigned_stud");

        create_section.addEventListener("click", (x) => {
            x.preventDefault();
            location.href = `./create_section.php?sy_id=${sy_id}`;
        })
        create_subject.addEventListener("click", (x) => {
            x.preventDefault();
            location.href = `./create_subject.php?sy_id=${sy_id}`;
        })
        assign_subject.addEventListener("click", (x) => {
            x.preventDefault();
            location.href = `./assign_subject.php?sy_id=${sy_id}`;
        })

        view_assigned_sub.addEventListener("click", (x) => {
            x.preventDefault();
            location.href = `./view_assigned_sub.php?sy_id=${sy_id}`;
        })

        assign_stud.addEventListener("click", (x) => {
            x.preventDefault();
            location.href = `assign_student.php?sy_id=${sy_id}`;
        })

        view_assigned_stud.addEventListener("click", (x) => {
            x.preventDefault();
            location.href = `./view_assigned_stud.php?sy_id=${sy_id}`;
        })
</script>


</body>
</html>