<?php
$feed_msg="";



include_once 'requires/header.php';
if(isset($_GET['letter'])){
  $result=$lms_con->getLetter($_GET['letter']);
  $letter=mysqli_fetch_array($result);
  
  $r_addr=$letter['receiver_address'];
  $s_addr=$letter['send_address'];
  $sender=$letter['sender'];
  $ref=$letter['letter_ref'];
  $subject=$letter['letter_subject'];
  $date=$letter['letter_date'];
  $source=$letter['unit_name'];
  $letter_id=$letter['letter_id'];

  $unit=$app_user->exMyunit($_SESSION['office']);

}

else{

}

if(isset($_POST['dispatch'])){
  if(!isset($_POST['destination'])){

    $feed_msg="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Attention!</strong> No destination selected
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
  }
  else{
      foreach($_POST['destination'] as $selected){
      
      $feed_msg=$lms_con->dispatch($letter_id,$_SESSION['office'],$selected,$_POST['receiver'],$_SESSION['user_id']);

        }

      }
  
    
    
}


?>



  

   <?php

   include_once 'requires/heading.php';
echo $feed_msg;
   ?>

<!-- letter itself -->
<center>
        <div class="col-md-9 card " style="width:80rem;">

        <div class="card-header bg-info">
        <b>Dispatching</b>
        </div>

        <!-- letter itself -->
<div class="card-body " id="letter_head">
  <div>

  </div>
<div class="">
  <div class="">
    <div class="row col-12">

      <div class="col-5 jumbotron">
        <p>
          <?php
        echo '
        <div class="row">
        '.$r_addr.'
        </div>
        ';

        echo '
        <div class="row">
        <b>'.$source.'</b>
        </div>
        ';
        ?>
        </p>
        
      </div>

      <div class="col-2"></div>

      <div class="col-5 jumbotron">
        <p>
          <?php
        echo '
        <div class="">
        '.$s_addr.'
        </div>
        ';
        ?></p>
      
      </div>


      

    </div>

    <div class="row container">

        <div class="col-4 ">
          <?php
        echo '
         Sender: <b>'.$sender.'</b>
      
        ';
        ?>
        </div>

        <div class="col-4 ">
          Reference:<?php
        echo '
        <div class="">
        <b>'.$ref.'</b>
        </div>
        ';
        ?>
        </div>
        
        <div class="col-4">
           Date:<?php
        echo '
        <div class="">
        <b>'.$date.'</b>
        </div>
        ';
        ?>
        </div>

      </div>

      <div class=" row col-12 jumbotron">
      <p>
        <?php
        echo '
        <div class="">
        '.$subject.'
        </div>
        ';
        ?>

      </p>
      
      </div>
      </div>



      </div>


  </div>
</div>

<br>

<div class="col-md-9 card " style="width:80rem;">

<form action="" class="form-group" method="post">
<div class="row">
 <div class="col-6">
 From: <input type="text" class="form-control" readonly value="<?php echo $extras->get_unit($_SESSION['office']) ?>">

 </div>

 <div class="col-6">
 To: <select class="selectpicker form-control" name="destination[]" data-live-search="true" data-actions-box="true" multiple>
  <optgroup label="Units">

  <?php
while($u=mysqli_fetch_array($unit)){
  echo"
  <option value='".$u["unit_id"]."' data-subtext='".$u["departments"]."' >".$u["unit"]. "</option>
  
  ";
}
?>
    
  </optgroup>
</select>
 </div>
</div>
<hr>
<div class="row">
<div class="col-6">
Receiver: <input type="text" class="form-control" name="receiver">
</div>
</div>
<br>
<div class="row">
<div class="sigPad" id="smoothed" style="width:404px;">
<!-- <h2>Bezier Curves (constant pen width)</h2> -->
<ul class="sigNav">
<li class="drawIt"><a href="#draw-it" >Draw It</a></li>
<li class="clearButton"><a href="#clear">Clear</a></li>
</ul>
<div class="sig sigWrapper" style="height:auto;">
<div class="typed"></div>
<canvas class="pad" width="400" height="250"></canvas>
<input type="hidden" name="output" class="output">
</div>
</div>
</div>




</div>
<br>
<div class="">
<div class="row">

<div class="col-6">
<a href="index.php" class="btn btn-danger btn-lg"><i class="fa fa-times" aria-hidden="true"><span class="icon_text">Cancel</span></i></a>
</div>

<div class="col-6">
<button class="btn btn-success btn-lg" type="submit" name="dispatch"><i class="fa fa-check" aria-hidden="true"><span class="icon_text">Dispatch</span></i></button>
</div>

</div>

</div>
</form>



</center>
  

  

        












         <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     <?php
     require_once 'requires/footer.php';
     ?>
     <script src="https://cdn.jsdelivr.net/npm/signature_pad@3.0.0-beta.3/dist/signature_pad.umd.min.js"></script>

