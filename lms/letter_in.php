<?php



include_once 'requires/header.php';

?>



  

   <?php

   include_once 'requires/heading.php';

   ?>

<!-- letter IN -->

<div class="container-fluid">

<div class="card">
<div class="card-header">
Receive New Letter!
</div>

<div class="card-body">

<form action="" class="form-group">
  <!-- row for ref and source -->
<div class="row">

  <div class="col-6">
Reference:<input class="form-control" type="text" name="ref" >
  </div>
   <div class="col-6">
Source: <input class="form-control" type="text" name="source">
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

<div class="col-12">
  Subject: <textarea name="subject" id="" class="form-control" cols="30" rows="10">

  </textarea>
</div>

 </div>


<hr>

<!-- from and to -->
<div class="row">

  <div class="col-6">
Sender:<input class="form-control" type="text" name="sender" >
  </div>
   <div class="col-6">
Destination: <input class="form-control" type="text" name="destination">
   </div>

</div>

<div class="row">

<div class="col-12">
  Signature: <input type="text" class="form-control">
</div>

</div>



</form>

</div>


</div>


  

  

        












         <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     <?php
     require_once 'requires/footer.php';
     ?>

