<?php
session_start();
if(!isset($_SESSION["user_id"])){
  session_destroy();
  header("Location:settings/login.php");
}

echo    
$_SESSION['user_id']." ".$_SESSION['role']." ".$_SESSION['office'];
// $_SESSION['fname']=$result['fname'];


require_once 'controllers/app.php';

$app_user= new app_user();
$lms_con = new lms_con();
$extras= new extras();


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GRA Letter Management</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="../css/sb-admin.css" rel="stylesheet">
<link href="../css/lms.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

  <!-- internal styling -->
  <style>
  
  div.dataTables_wrapper {
        margin-bottom: 3em;
    }

  </style>

</head>
