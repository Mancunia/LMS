<?php



include_once 'requires/header.php';

$unit=$app_user->getUnit();
$units=$app_user->getUnit();

?>



  

   <?php
   if(isset($_POST['atmp_patch'])){
     $To=$_POST['To'];
    foreach($To as $selected){

      echo $selected."</br>";
  
      }

   }

   include_once 'requires/heading.php';
   

   ?>

<!-- letter IN -->

<center>
        <div class="col-md-9 card " style="width:80rem;">
<div class="card-header">
<b>Receive New Letter!</b>
</div>


<form action="" class="form-group">
<div class="card-body">
  <!-- row for ref and source -->
<div class="row">

  <div class="col-6">
Reference:<input class="form-control" type="text" name="ref" >
  </div>
   <div class="col-6">
Source: 

<select name="" id="" class="selectpicker form-control" data-live-search="true" data-actions-box="true">

    <?php

      while($u=mysqli_fetch_array($units)){
        echo"
  <option value='".$u["unit_id"]."' data-subtext='".$u["departments"]."' >".$u["unit"]. "</option>
  
  ";
      }

    ?>  
          

</select>
   </div>

</div>

<div class="row">

<div class="col-6">
  Letter Date: <input type="date" class="form-control" name="letter_date">
</div>
</div>
<hr>
 <!-- Subject -->
<div class="row">

<div class="col-6 ">
Sender Address:
<textarea name="add_send" id="" cols="10" rows="5" class="form-control"></textarea>
</div>

<div class="col-6 ">
Receiver Address:
<textarea name="add_receive" id="" cols="10" rows="5" class="form-control"></textarea>
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
<input class="form-control" type="text" name="from" >
  </div>
   <div class="col-6">
Destination: <br>
<select class="selectpicker form-control" name="des_unit" data-live-search="true" data-actions-box="true" multiple>
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
<?php
while($u=mysqli_fetch_array($unit)){
  echo"
  <option value='".$u["unit_id"]."'>(".$u["departments"].") ".$u["unit"]. "</option>
  
  ";
}
?>
</div>

<div class="row">

<div class="col-12">
  Signature: <input type="text" class="form-control">
</div>

</div>




</div>
</div>
<br>
<div class="col-md-9 card " style="width:80rem;">

<div class="row ">

<div class="col-6">
<a href="index.php" class="btn btn-danger btn-lg">Back</a>
</div>

<div class="col-6">
<button type="submit" name="atmp_patch" class="btn btn-success btn-lg">Proceed</button>
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

