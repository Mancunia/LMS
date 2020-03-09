<?php



include_once 'requires/header.php';

$unit=$app_user->exMyunit($_SESSION['office']);
$units=$app_user->getUnit();
$feed_msg="";
?>



  

   <?php
   
   include_once 'requires/heading.php';
   
   if(isset($_POST['submit'])){
    //  $To=$_POST['destination'];
    //  $from=$_POST['source'];

    echo $_POST['ref']." " .$_POST['source']." " .$_POST['sender']." " . $_POST['letter_date']." " . $_POST['send_addr']." " . $_POST['receive_addr']." " . $_POST['subject'];
    if(!isset($_POST['sender'])){
      $sender=$_POST['source'];
    }
    else{
      $sender=$_POST['sender'];
    }

     $letter=$lms_con->post_letter($_POST['ref'], $_POST['source'],$sender, $_POST['letter_date'], $_POST['send_addr'], $_POST['receive_addr'], $_POST['subject']);
     

     /* if there is a destination or destinations */
     if(isset($_POST['destination'])){
      echo "des";
       foreach($_POST['destination'] as $selected){
        echo "des";
        $feed_msg=$lms_con->dispatch($letter,$_POST['source'],$selected);

      // echo $selected."</br>";
  
      }

     }
     else{
        echo "no des";
      $feed_msg=$lms_con->dispatch($letter,$_POST['source'],$_SESSION['office'], $_SESSION['user_id']);

     }

    

      

   }

   
  


   
   echo $feed_msg;
   ?>

<!-- letter IN -->

<center>
        <div class="col-md-9 card " style="width:80rem;">
<div class="card-header">
<b>Receive New Letter!</b>
</div>


<form action="" class="form-group" method="POST">
<div class="card-body">
  <!-- row for ref and source -->
<div class="row">

  <div class="col-4">
Reference:<input class="form-control" type="text" name="ref" >
  </div>
   <div class="col-4">
Source: <!--<div id="source1"> -->

  <select  name="source" id="source1" class=" form-control" data-live-search="true" data-actions-box="true" >
| <option id="priv">Select Source</option>
    <?php

      while($u=mysqli_fetch_array($units)){
        echo"
  <option value='".$u["unit_id"]."' data-subtext='".$u["departments"]."' >".$u["unit"]. "</option>
  
  ";
      }

    ?>  
          

  </select>

<!-- </div> -->


<input type="text" id="source2" class="form-control" style="display:none;" />
   </div>
<div class="col-4">
  Letter Date: <input type="date" class="form-control" name="letter_date">
</div>
</div>

<div class="row">


</div>
<hr>
 <!-- Subject -->
<div class="row">

<div class="col-6 ">
Sender Address:
<textarea name="send_addr" id="" cols="5" rows="3" class="form-control"></textarea>
</div>

<div class="col-6 ">
Receiver Address:
<textarea name="receive_addr" id="" cols="5" rows="3" class="form-control"></textarea>
</div>

</div>

 <div class="row">
<div class="col-12">
  Subject: <textarea name="subject" id="" class="form-control" cols="30" rows="5">

  </textarea>
</div>

 </div>


<hr>

<!-- from and to -->
<div class="row">

  <div class="col-6">
Sender:
<input class="form-control" type="text" name="sender" >
  </div>
   <div class="col-6">
Destination: <br>
<select class="selectpicker form-control" name="destination[]" data-live-search="true" data-actions-box="true" multiple>
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
<br>

<div class="row">

<div class="col-12">
  Signature: <input type="text" class="form-control">
</div>

</div>
<br>
<div class="card-footer">
<div class="row ">

<div class="col-6">
<a href="index.php" class="btn btn-danger btn-lg">Back</a>
</div>

<div class="col-6">
<button type="submit" name="submit" class="btn btn-success btn-lg">Proceed</button>
</div>



</div>
</div>



</div>




</div>
</div>

<div class="col-md-9 card " style="width:80rem;">


</div>
</form>





</center>

  

  

        












         <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     <?php
     require_once 'requires/footer.php';
     ?>
     <script>
     $(function() {

$('#chkveg').multiselect({
  includeSelectAllOption: true
});

$('#btnget').click(function() {
  alert($('#chkveg').val());
});
});






     </script>

