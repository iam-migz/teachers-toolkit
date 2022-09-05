<?php include '../partials/student_head.inc.php'; ?>

<!-- MDBootstrap Cards Extended Pro  -->
<link href="../mdb/css/addons-pro/cards-extended.min.css" rel="stylesheet">
<style>
    .container{
        margin-top: 4%;
    }
</style>
</head>
<body>
    <?php include '../partials/student_nav.inc.php'; ?>

    <div class="container">
        <h2>University of San Carlos</h2>
        <p class="lead">Section: Hawking</p>
        <div class="row mt-4" id="sy_list">
            <div class="col-md-12 mt-1 mb-4 box_card"> 
                <div class="card">
                    <div class="card-image" style="background-image: url('../images/grades.png'); background-repeat: no-repeat; background-size: cover;">
                        <a href="grades.php">
                            <div class="text-white d-flex h-100 mask purple-gradient-rgba">
                                <div class="first-content align p-3">
                                    <h3 class="card-title" style="font-weight: 400">View Grades</h3>
                                    <p class="lead mb-0">August 2020 - June 2021</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <hr> 
    </div>

    <script>
    </script>
</body>
</html>