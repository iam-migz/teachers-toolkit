<?php include '../partials/teacher_head.inc.php';?>
<style>
    .container{
        margin-top: 4%;
    }
    #school_name {
        text-transform: capitalize;
        font-style: italic;
    }
</style>
</head>
<body>
    <?php include '../partials/teacher_nav.inc.php'; ?>

    <div class="container">
        <h2 id="school_name"></h2>
        <p class="lead">School Year Lists</p>

        <div class="row mt-4" id="sy_list">
            <!-- data from db -->
        </div>

        <!-- <div class="row mt-4" id="sy_list">
            <div class="col-md-6 mt-1 mb-4 box_card"> 
                <div class="card">
                    <div class="card-image" style="background-image: url('../images/school_year.png'); background-repeat: no-repeat; background-size: cover;">
                        <a href="subject_lists.php">
                            <div class="text-white d-flex h-100 mask aqua-gradient-rgba">
                                <div class="first-content align p-3">
                                    <h3 class="card-title" style="font-weight: 400">Academic Year</h3>
                                    <p class="lead mb-0">August 2020 - June 2021</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
        <hr>
    </div>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
    const school_id = <?php echo $_SESSION['school_id']; ?>;
    axios.get(`http://localhost/teachers-toolkit-app/server/schoolyear/findAll/${school_id}`)
        .then(res => {
            if (res.data.result == 0) {
                return;
            }
            const sy = res.data.data;
            const sy_list = document.querySelector('#sy_list');
            console.log(sy);
            sy.forEach(elem => {
                const date_start = new Date(elem.sy_start);
                const date_end = new Date(elem.sy_end);

                const month_start = date_start.toLocaleString('default', { month: 'long' });
                const month_end = date_end.toLocaleString('default', { month: 'long' });

                const div = document.createElement('div');
                div.classList.add('col-md-6')
                div.classList.add('mb-4')
                div.innerHTML = `
                    <div class="card">
                        <div class="card-image" style="background-image: url('../images/school_year.png'); background-repeat: no-repeat; background-size: cover;">
                            <a href="./subject_lists.php?sy_id=${elem.id}">
                                <div class="text-white d-flex h-100 mask aqua-gradient-rgba">
                                    <div class="first-content align p-3">
                                        <h3 class="card-title" style="font-weight: 400">Academic Year</h3>
                                        <p class="lead mb-0">${month_start} ${date_start.getFullYear()} - ${month_end} ${date_end.getFullYear()}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                `;
                sy_list.appendChild(div);
            });

        })
        .catch(err => console.log(err));
    
    // set school
    axios.get(`http://localhost/teachers-toolkit-app/server/school/findOne/${school_id}`)
        .then(res => {
            const school = res.data.data;
            $('#school_name').html(school.school_name); 
            console.log('school :>> ', school);
        })
        .catch(err => console.log(err));
</script>
</body>
</html>