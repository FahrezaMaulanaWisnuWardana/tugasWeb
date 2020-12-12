<?php 
  if (!isset($_SESSION['user']['id_users'])) {
    $_SESSION['alert']['gagal'] = "Silahkan Login Dahulu";
    header("location:{$_ENV['base_url']}".'cms-dashboard'."");
  }
 ?>
<!DOCTYPE html>
<html lang="en">
    <?php 
      $segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'));
      $numSegments = count($segments);
      $current = $segments[$numSegments-1];
      $currentSub = $segments[$numSegments-3];
     ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?=$title?></title>
  <link rel="icon" type="image/png" sizes="16x16" href="https://static.thenounproject.com/png/6725-200.png">

  <!-- Custom fonts for this template-->
  <link href="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=$_ENV['base_url']?>cms-dashboard/assets/css/sb-admin-2.min.css" rel="stylesheet">