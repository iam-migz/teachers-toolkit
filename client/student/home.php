<?php include "../partials/student_head.inc.php"; ?>
<!-- MDBootstrap Cards Extended Pro  -->
<link href="../mdb/css/addons-pro/cards-extended.min.css" rel="stylesheet">
<style>
    .container{
        margin-top: 4%;
    }
</style>
</head>
<body>
    <?php include "../partials/student_nav.inc.php"; ?>

    <div class="container">
        <h2>University of San Carlos</h2>
        <p class="lead">Section: Hawking</p>
        <div class="row mt-4">
            <div class="col-md-12 mb-4 box_card" id="sy_list"> 
              <!-- content here -->
            </div>
        </div>
        <hr> 
    </div>

<script>
  const school_id = <?php echo $_SESSION['school_id']; ?>;
  const sy_div = document.getElementById('sy_list');
  axios.get(`http://localhost/teachers-toolkit-app/server/schoolyear/findAll/${school_id}`)
    .then(res => {
      const data = res.data;
      let content = '';
      if (data.result === 1) {
        data.data.forEach(sy => {
          console.log('sy', sy)
          const date_start = new Date(sy.sy_start);
          const date_end = new Date(sy.sy_end);

          const month_start = date_start.toLocaleString('default', { month: 'long' });
          const month_end = date_end.toLocaleString('default', { month: 'long' });
          content += `
          <div class="card mt-2">
            <div class="card-image" style="background-image: url('../images/grades.png'); background-repeat: no-repeat; background-size: cover;">
              <a href="grades.php">
                <div class="text-white d-flex h-100 mask purple-gradient-rgba">
                  <div class="first-content align p-3">
                    <h3 class="card-title" style="font-weight: 400">View Grades</h3>
                    <p class="lead mb-0">${month_start} ${date_start.getFullYear()} - ${month_end} ${date_end.getFullYear()}</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          `;
        })
        sy_div.innerHTML = content;
      }
    })
    .catch(err => console.log(err))
</script>
</body>
</html>