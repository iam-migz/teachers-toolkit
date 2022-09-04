<?php 
    $path = '/teachers-toolkit-app/client';
?>

<style>
    body, html{ min-height: 100%; }
    body{
        background-image: url(<?php echo $path; ?>/images/home.jpg);  
        background-repeat: no-repeat;
        background-size: cover;
        margin: 0;
    }
    .navbar-brand{
        margin-left: 10%;
        font-weight: 400;
        font-size: 23px;
    }
    .navbar-collapse{
        margin-right: 10%;
    }
    .nav-item{
        font-size: 19px;
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
<nav class="navbar navbar-expand-lg navbar-dark default-color sticky-top">
    <a class="navbar-brand" rel="next" href="<?php echo $path; ?>/admin/home.php">Teachers Toolkit</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" 
        aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-plus-circle"></i>Create Account</a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-4">
                    <a class="dropdown-item" href="<?php echo $path; ?>/admin/create_teacher.php"><img src="<?php echo $path; ?>/images/teacher.png" class="pr-3" style="height: 40px" alt="teacher">Teacher Account</a>
                    <a class="dropdown-item" href="<?php echo $path; ?>/admin/create_student.php"><img src="<?php echo $path; ?>/images/student.png" class="pr-3" style="height: 40px" alt="student">Student Account</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i><?php echo $_SESSION['user_id']; ?></a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-4">
                    <a class="dropdown-item" href="#">My account</a>
                    <a class="dropdown-item" href="<?php echo $path; ?>/login/logout.php">Log out</a>
                    <a class="dropdown-item" href="">access: <?php echo $_SESSION['access']; ?></a>
                    <a class="dropdown-item" href="">user_id: <?php echo $_SESSION['user_id']; ?></a>
                    <a class="dropdown-item" href="">account_id: <?php echo $_SESSION['account_id']; ?></a>
                    <a class="dropdown-item" href="">school_id: <?php echo $_SESSION['school_id']; ?></a>
                </div>
            </li>
        </ul>
    </div>  
</nav>