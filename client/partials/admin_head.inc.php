<?php
session_start();
if (!isset($_SESSION["access"]) || $_SESSION["access"] != 3) {
    header(
        "location: http://localhost/teachers-toolkit-app/client/login/login.html"
    );
}


$dir = __DIR__;
// windows __DIR__ has \
if (str_contains($dir, '\\')) {
  $dir = str_replace('\\', '/', $dir);
}

$rel_dir = explode($_SERVER['DOCUMENT_ROOT'], $dir)[1];
$temp = explode('/', $rel_dir);
array_pop($temp);
$path = implode('/', $temp);
define('PATH', $path);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher's Toolkit</title>

  <!-- favicon -->
  <link rel="icon" href="<?php echo PATH; ?>/images/tk.png" type="image/gif" sizes="16x16" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?php echo PATH; ?>/mdb/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="<?php echo PATH; ?>/mdb/css/mdb.min.css">

  <!-- jQuery -->
  <script type="text/javascript" src="<?php echo PATH; ?>/mdb/js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo PATH; ?>/mdb/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo PATH; ?>/mdb/js/mdb.min.js"></script>

  <!-- axios -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>