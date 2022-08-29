<?php 
        session_start();
        if(isset($_SESSION['access']) && $_SESSION['access'] == 3){

        }else{
            header("location: http://localhost/teachers-toolkit-app/client/login/login.html");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- MDBootstrap Datatables  -->
    <link href="../mdb/css/addons/datatables2.min.css" rel="stylesheet">
    <!-- DataTables Select CSS -->
    <link href="../mdb/css/addons/datatables-select2.min.css" rel="stylesheet">    
    <style>
        body, html{ min-height: 100%; }
        body{
            background-image: url(../images/sample.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            margin-bottom: 5%;
        }
        .view-container{
            margin: 2% 2% 4% 2%;
        }
        #error-msg{
            position: absolute;
            color: red;
        }
    </style>

</head>
<body>
    <!--Main Header-->
    <?php include '../partials/header_admin.php'; ?>
    
    <div class="view-container">
        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Edit School Information</h3>
            <div class="card-body">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg">
                    <table id="paginationFirstLast" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">School name</th>
                                <th class="th-sm">Barangay</th>
                                <th class="th-sm">City</th>
                                <th class="th-sm">Province</th>
                                <th class="th-sm">Country</th>
                                <th class="th-sm">Postal Code</th>
                                <th class="th-sm">Principal First Name</th>
                                <th class="th-sm">Principal Middle Name</th>
                                <th class="th-sm">Principal Last Name</th>
                                <th class="th-sm">Save</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td contenteditable="true" id="school_name"></td>
                                <td contenteditable="true" id="barangay"></td>
                                <td contenteditable="true" id="city"></td>
                                <td contenteditable="true" id="province"></td>
                                <td contenteditable="true" id="country"></td>
                                <td contenteditable="true" id="postal_code"></td>
                                <td contenteditable="true" id="principal_fn"></td>
                                <td contenteditable="true" id="principal_mn"></td>
                                <td contenteditable="true" id="principal_ln"></td>
                                <td><button type="button" class="btn btn-blue btn-sm m-0" style="width: 100%;" id="btn_submit">Save</button></td>
                            </tr>
                        </tbody>
                        <div id="error-msg"></div>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../mdb/js/addons/datatables2.min.js"></script>
    <!-- DataTables Select JS -->
    <script src="../mdb/js/addons/datatables-select2.min.js" type="text/javascript"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        const school_id = <?php echo $_SESSION['school_id']; ?>;
        axios.get(`http://localhost/teachers-toolkit-app/server/api/school/read_one.php?id=${school_id}`)
            .then(res => {
                
                const school = res.data;
                console.log(school);

                const barangay = document.querySelector("#barangay");
                const city = document.querySelector("#city");
                const province = document.querySelector("#province");
                const country = document.querySelector("#country");
                const postal_code = document.querySelector("#postal_code");
                const principal_fn = document.querySelector("#principal_fn");
                const principal_ln = document.querySelector("#principal_ln");
                const principal_mn = document.querySelector("#principal_mn");
                const school_name = document.querySelector("#school_name");

                barangay.innerHTML = school.barangay;
                city.innerHTML = school.city;
                province.innerHTML = school.province;
                country.innerHTML = school.country;
                postal_code.innerHTML = school.postal_code;
                principal_fn.innerHTML = school.principal_fn;
                principal_ln.innerHTML = school.principal_ln;
                principal_mn.innerHTML = school.principal_mn;
                school_name.innerHTML = school.school_name;

            })
            .catch(err => console.log(err));

            const btn_submit = document.querySelector("#btn_submit");
            btn_submit.onclick = function(){
                console.log('hey iggy');
                const barangay = document.querySelector("#barangay").innerHTML;
                const city = document.querySelector("#city").innerHTML;
                const province = document.querySelector("#province").innerHTML;
                const country = document.querySelector("#country").innerHTML;
                const postal_code = document.querySelector("#postal_code").innerHTML;
                const principal_fn = document.querySelector("#principal_fn").innerHTML;
                const principal_ln = document.querySelector("#principal_ln").innerHTML;
                const principal_mn = document.querySelector("#principal_mn").innerHTML;
                const school_name = document.querySelector("#school_name").innerHTML;
                const errorDiv = document.querySelector("#error-msg");

                if (barangay == '' || city == '' || province == '' || country == '' || postal_code == '' || principal_fn == '' || principal_ln == '' || principal_mn == '' || school_name == ''){
                    errorDiv.innerHTML = "Please complete the form";
                    return;
                }

                axios.put('http://localhost/teachers-toolkit-app/server/api/school/update.php', {
                    'id': school_id, barangay, city, province, country, postal_code, principal_fn,  principal_ln,  principal_mn, school_name 
                })
                    .then(res => {
                        if (res.data.result) {
                            location.reload();
                        }
                    })
                    .catch(err => console.log(err));

            }
    </script>

</body>
</html>