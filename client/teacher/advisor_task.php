<?php include "../partials/teacher_head.inc.php"; ?>

<!-- MDBootstrap Datatables  -->
<link href="../mdb/css/addons/datatables.min.css" rel="stylesheet">
<style>
	.container {
		background-color: white;
		margin-top: 4%;
	}
</style>
</head>

<body>
	<?php include "../partials/teacher_nav.inc.php"; ?>

	<h3 class="text-center mt-4 mb-0">
		Advisory Task
	</h3>
	<div class="container mt-4">
		<ul class="nav md-pills nav-justified pills-success-color-dark mb-4">
			<li class="nav-item pl-0">
				<a class="nav-link active " data-toggle="tab" href="#student_lists" role="tab">
					<i class="fas fa-user-graduate mr-2 fa-lg"></i>
					Your Students</a>
			</li>
			<li class="nav-item pl-0">
				<a class="nav-link" data-toggle="tab" href="#subject_lists" role="tab">
					<i class="fas fa-book mr-2 fa-lg"></i>
					Your Subjects</a>
			</li>
			<li class="nav-item pl-0">
				<a class="nav-link" data-toggle="tab" href="#report_card" role="tab">
					<i class="fas fa-star mr-2 fa-lg"></i>
					Report Events</a>
			</li>
		</ul>
		<div class="tab-content mb-4">
			<!--Panel Students-->
			<div class="tab-pane fade in show active" id="student_lists" role="tabpanel">
				<div class="table-responsive-sm table-responsive-md table-responsive-lg mt-0 mt-0">
					<table id="your_students" class="table table-sm table-hover" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="th-sm">Student ID</th>
								<th class="th-sm">Name</th>
								<th class="th-sm">LRN</th>
								<th class="th-sm">Email Address</th>
								<th class="th-sm">Address</th>
								<th class="th-sm">Gender</th>
							</tr>
						</thead>
						<tbody id="insert_to_students">
							<!-- DATA -->
							<!-- <tr>
                                <td>1098</td>
                                <td>Mendoza, Dhony Mark Dupio</td>
                                <td>19102710</td>
                                <td>DhonyMark@gmail.com</td>
                                <td>Province, Barangay, City</td>
                                <td>M</td>
                            </tr> -->
						</tbody>
					</table>
				</div>
			</div>
			<!--Panel Subjects-->
			<div class="tab-pane fade" id="subject_lists" role="tabpanel">
				<div class="table-responsive-sm table-responsive-md table-responsive-lg mt-0">
					<table id="your_subjects" class="table table-sm table-hover" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="th-sm">Subject Name</th>
								<th class="th-sm">Semester</th>
								<th class="th-sm">Hours</th>
							</tr>
						</thead>
						<tbody id="insert_to_subjects">
							<!-- DATA -->
							<!-- <tr>
                                <td>View of Analytics</td>
                                <td>1st Semester</td>
                                <td>20</td>
                            </tr> -->
						</tbody>
					</table>
				</div>
			</div>
			<!--Panel Report Card-->
			<div class="tab-pane fade" id="report_card" role="tabpanel" onclick="reportCard()">
				<div class="card card-image mb-3" style="background-image: url(../images/gradient.jpg);">
					<div class="text-white text-center rgba-stylish-strong py-5 px-4">
						<div class="py-5">
							<h2 class="card-title h2 my-2 py-1">Generate Report Card</h2>
							<p class="mb-4 pb-2 px-md-5 mx-md-5">Teachers can use report cards to communicate with students'
								parents about their academic achievement and general school activities.</p>
							<a class="btn btn-rounded btn-outline-warning"><i class="fas fa-clone left"></i> Generate</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<script>
		// get section_id from query params
		const urlParams = new URLSearchParams(window.location.search);
		const section_id = urlParams.get('section_id');

		// set students
		axios.get(`http://localhost/teachers-toolkit-app/server/studentassign/findBySectionId/${section_id}`)
			.then(res => {
				let students = res.data.data;
				console.log('students :>> ', students);
				const insert_to = document.querySelector("#insert_to_students");
				let tr
				students.forEach(stud => {
					tr = document.createElement('tr')
					tr.innerHTML = `
                        <td>${stud.user_id}</td>
                        <td>${stud.student_name}</td>
                        <td>${stud.LRN}</td>
                        <td>${stud.email}</td>
                        <td>${stud.address}</td>
                        <td>${stud.gender}</td>
                    `
					insert_to.appendChild(tr)
				})
			})
			.catch(err => console.log(err))

		// set subjects
		axios.get(`http://localhost/teachers-toolkit-app/server/subject/findBySectionId/${section_id}`)
			.then(res => {
				let subjects = res.data.data;
				console.log('subjects :>> ', subjects);
				const insert_to = document.querySelector("#insert_to_subjects");
				let tr
				subjects.forEach(sub => {
					tr = document.createElement('tr')
					tr.innerHTML = `
                        <td>${sub.subject_name}</td>
                        <td>Semester ${sub.semester}</td>
                        <td>${sub.hours} Hours</td>
                    `
					insert_to.appendChild(tr)
				})
			})
			.catch(err => console.log(err))

		function reportCard() {
			location.href = `http://localhost/teachers-toolkit-app/server/api/grades/report_card.php?section_id=${section_id}`
		}
	</script>

</body>

</html>