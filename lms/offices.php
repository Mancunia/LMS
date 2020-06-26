<?php
require_once 'requires/header.php';
// include 'requires/app_user.php';
// $app=new app_user();
$result=$app_user->getDepartment();

if(isset($_GET['depart'])){
  $office=$app_user->getUnit_id($_GET['depart']);
}
else{
$office=$app_user->getUnit();
}
if(isset($_POST['newOffice'])){
  $app_user->newUnit($_POST['office'],$_POST['officeAcro'],$_POST['department']);
  header("Location:offices.php");
}



include_once 'includes/newOffice.php';
include 'requires/heading.php';
?>

<!-- Modal -->



    <div id="content-wrapper">

      <div class="container-fluid">
        <button class="btn btn-lg btn-info"  data-toggle="modal" data-target="#officeModal" >Add A New Office</button>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Offices</div>
          <div class="card-body">
            <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th>#</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>#</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php  
                $i=1;
                         while($d=mysqli_fetch_array($office)){
                         
                          echo "
                          <tr>
                    <td>".$i."</td>
                    <td>".$d['unit']."</td>
                    <td>".$d['departments']."</td>
                    <td>
                    <a class='btn btn-primary' href='users.php?office=".$d['unit_id']."'>Users</a>
                    </td>                    
                  </tr>
                          ";
                         $i++;
                        }
                           ?>
                  <!-- <a class='btn btn-info'></a> -->
                  </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>


      </div>
      <!-- /.container-fluid -->

      <?php
require 'requires/footer.php';
      ?>
