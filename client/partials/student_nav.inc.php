<?php 
    $path = '/teachers-toolkit-app/client';
?>

<style>
    body, html{ min-height: 100%; }
    body{
        /* background: #87ceeb3d; */
        background-image: url(../images/home.jpg);  
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
    .nav_dd{
        font-size: 19px;
        margin-right: 5%;
    }
    .nav_simple{
        font-size: 19px;
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
  <a class="navbar-brand" rel="next" href="<?php echo $path; ?>/student/home.php">Teachers Toolkit</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" 
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i><?php echo $_SESSION['user_id']; ?></a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="#">My account</a>
          <a class="dropdown-item" href="<?php echo $path; ?>/login/logout.php">Log out</a>
        </div>
      </li>
    </ul>
  </div>  
</nav>