<body id="page-top">

<!--Nav -->
<?php include_once 'nav_bar.php'; ?>
<div id="wrapper">
<!--sidebar -->
  <?php include_once 'sidebar.php'; 

$crumbs = explode("/",$_SERVER["REQUEST_URI"]);



  $path = $_SERVER['PHP_SELF']; 
  
  $file1 = basename($path); 
  $file2 = basename($path, ".php"); 

  if($file2=='index'){
    $file2='';
  }

  ?>
  
  <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb my_body">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"><?php 
         echo $file2;
           ?></li>
        </ol>
        
        <div id="this_alert"class="container row">

        <div class="alert " role="alert">

          <h4 class="alert-heading" id="heading">
            <!-- Heading--> 
          </h4>

          <p id="reason">
            <!--Reason -->

           </p>
           <i id="icon"></i>
          <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button> -->
        </div>
        

          </div>