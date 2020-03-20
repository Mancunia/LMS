<?php 
require_once '../controllers/app.php';
$lms_con = new lms_con();
$extras= new extras();

// $dispatch_id=$_REQUEST['dispatch_id'];
if(isset($_GET['dispatch_id'])){
    $result=$lms_con->getDispatch($_GET['dispatch_id']);

$l=mysqli_fetch_array($result);
$lf_id=$l['letter_flow_id'];
$letter_id=$l['letter_id'];
$source=$l['source'];
$destination=$l['des'];
$sender=$l['sender'];
$date=$l['flow_date'];

$r_addr=$l['receiver_address'];
  $s_addr=$l['send_address'];
  $ref=$l['letter_ref'];
  $subject=$l['letter_subject'];


    echo'

    <form action="" name="dispatch_form"  class="form-group" onsubmit="updateDispatch()">
    
    <div class="container" style="margin-left:10px;">
    <div class="row col-md-12">

      <div class="col-md-5 jumbotron">
        <p>
           
        <div class="row">
        '.$r_addr.'
        </div>
       
        </p>
        
      </div>

      <div class="col-md-2"></div>

      <div class="col-md-5 jumbotron">
        <p>
          
        <div class="">
        '.$s_addr.'
        </div>
        </p>
      
      </div>


      

    </div>

    <div class="row container">

        

        <div class="col-md-12 row">
          Reference:
        <div class="">
        <b>'.$ref.'</b>
        </div>
        
        </div>
        
        

      </div>

      <div class=" row col-md-12 container jumbotron">
      <p>
    
        <div class="">
        '.$subject.'
        </div>
        


      </p>
      
      </div>
      </div>



      </div>








    <div class="container ">
    <div class="row">

    <div class="col-md-6">
    <label for="src" class="">From</label>
    <input type="text" name="src" class="form-control" value="'.$extras->get_unit($source).'" readonly>
    </div>

    <div class="col-md-6">
    <label for="des" class="">To</label>
    <input type="text" name="des" class="form-control" value="'.$extras->get_unit($destination).'" readonly>
    </div>

    </div>
     
    </div>

    <div class="container ">
    <div class="row">

    <div class="col-md-6">
        <label for="sender" class="">Sender</label>
        <input type="text" name="sender" class="form-control" value="'.$extras->get_user($sender).'" readonly>
        </div>

        <div class="col-md-6">
        <label for="receiver" class="">Receiver</label>
        <input type="text" name="receiver" class="form-control">
        <span id="re_ce"></span>
        </div>
        
    </div>
        </div>


        <div class="container">
        <div class="row">
        signature
        </div>
        </div>
        


        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="letter_id" class="btn btn-primary" value="'.$lf_id.'">Dispatch</button>
      </div>
        </form>

    ';
}










?>