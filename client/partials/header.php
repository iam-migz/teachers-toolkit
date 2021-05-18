<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Teacher's Toolkit</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<!-- Google Fonts Roboto -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="../mdb/css/bootstrap.min.css">
<!-- Material Design Bootstrap -->
<link rel="stylesheet" href="../mdb/css/mdb.min.css">

<!-- jQuery -->
<script type="text/javascript" src="../mdb/js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../mdb/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../mdb/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../mdb/js/mdb.min.js"></script>

<link rel="stylesheet" href="./header.css">
<style>
    body{
        background: #87ceeb3d;
    }
    .navbar-brand{
        margin-left: 50%;
    }
    .navbar-collapse{
        margin-right: 5%;
    }
    .nav-item{
        font-size: 18px;
        margin-right: 5%;
    }
    @media screen and (max-width: 990px) {
        .navbar-brand{
            font-size: 30px;
            margin-left: 0;
        }
        .navbar-collapse{
            margin-right: 0%;
        }
    }
</style>
<!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark default-color sticky-top">
    <b><a class="navbar-brand" href="./home.php">Teachers Toolkit</a></b>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" 
        aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-graduation-cap"></i>Academic</a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-4">
                    <a class="dropdown-item" href="#">Create Subject</a>
                    <a class="dropdown-item" href="#">Create Section</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-plus-circle"></i>Create Account</a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-4">
                    <a class="dropdown-item" href="./create_teacher.php">Teacher Account</a>
                    <a class="dropdown-item" href="#">Student Account</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i><?php echo $_SESSION['user_id']; ?></a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-4">
                    <a class="dropdown-item" href="#">My account</a>
                    <a class="dropdown-item" href="../login/logout.php">Log out</a>
                </div>
            </li>
        </ul>
    </div>  
</nav>
<!--/.Navbar -->