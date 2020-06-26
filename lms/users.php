<?php
require_once 'requires/header.php';


$role=$app_user->getRole();
$rank=$app_user->getRank();
$group=$app_user->getGroup();
$office=$app_user->getUnit();

$feed="";
$here= $_SERVER['PHP_SELF'];
if(isset($_POST['newUser'])){
  extract($_POST);
  // echo $userName.$fname.$lname.$dob.$staff_id.$phone.$add_ress.$ranke.$email;
  $pid=$app_user->newPerson($userName,$fname,$lname,$dob,$staff_id,$phone,$add_ress,$ranke,$email);

  // echo $userName;

 $feed=$app_user->newUser($pid,$userName,$role,$office);
//  echo $_SESSION['user_id'];
//  echo $office;
}

if(isset($_GET['on'])){
  $feed=$app_user->acntOn($_GET['on']);

  // header ("Location:index.php");
}

if(isset($_GET['off'])){
  $feed=$app_user->acntOff($_GET['off']);

  // header ("Location:index.php");

}

if(isset($_GET['office'])){

  $users=$app_user->getStaff($_GET['office']);
}
// else{
//   $users=$app_user->getUserAdmin();

// }

if(isset($_POST['newRank'])){

  $feed=$app_user->addRank($_POST['Rname'],$_SERVER['REQUEST_URI']);
}




//form
include_once 'includes/adminUsers.php';
include_once 'includes/newRank.html';
include 'requires/heading.php';
?>

<!-- Modal -->



    <div id="content-wrapper">

      <div class="container-fluid">
      
        
        <?php echo $feed; ?>
        <button class="btn btn-lg btn-info"  data-toggle="modal" data-target="#userModal" >Add A New Account</button>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          User</div>
          <div class="card-body">
            <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Staff ID</th>
                    <th>Rank</th>
                    <th>Date Added</th>
                    <th>Last_Login</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tfoot>
                <tr>
                  <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Staff ID</th>
                    <th>Rank</th>
                    <th>Date Added</th>
                    <th>Last_Login</th>
                    <th>Status</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php
                  $i=1;
                  while($u=mysqli_fetch_array($users)){
                    echo "
                    <tr>
                    <td>".$i."</td>
                    <td>".$u['f_name']." ".$u['l_name']."</td>
                    <td>".$u['phone']."</td>
                    <td>".$u['staff_id']."</td>
                    <td>".$u['rank_id']."</td>
                    <td>".$u['person_date']."</td>
                    <td>".$u['last_login']."</td>

                    <td>";

                    if($u['status']==1){
                      echo '<a href="users.php?off='.$u['user_id'].'" class="btn btn-danger btn-group-toggle">Deactivate</a>';
                    }
                    else{
                      echo '<a href="users.php?on='.$u['user_id'].'" class="btn btn-success btn-group-toggle">Activate</a>';
                    }
                    
                    echo"</td>
                    
                    
                  </tr>
                    
                    ";
                    $i++;

                  }
                  
                  
                  ?>
                  <!-- <a href='users.php?times=".$u['user_id']."'>&times;</a> -->
                  
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
