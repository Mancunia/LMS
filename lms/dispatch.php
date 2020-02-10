<?php



include_once 'requires/header.php';

?>



  

   <?php

   include_once 'requires/heading.php';

   ?>

<!-- letter itself -->
<center>
        <div class="col-md-9 card " style="width:80rem;">

        <div class="card-header bg-warning">
        Dispatching
        </div>

        <!-- letter itself -->
<div class="card-body " id="letter_head">
  <div>

  </div>
<div class="">
  <div class="">
    <div class="row col-12">

      <div class="col-5 jumbotron">
        receipient Address
      </div>
      <div class="col-2"></div>
      <div class="col-5 jumbotron">
        Sender Address
      </div>


      <div class=" col-12 jumbotron">
        Subject
      </div>

    </div>
  </div>



</div>


</div>

<form action="" class="form-group">
<div class="row">
 <div class="col-6">
 From: <input type="text" class="form-control" readonly value="Office name">

 </div>

 <div class="col-6">
 To: <input type="text" class="form-control">
 </div>
</div>
<hr>
<div class="row">
<div class="col-6">
Receiver: <input type="text" class="form-control">
</div>
</div>
<div class="row">
Signature: <textarea name="" id="" cols="30" rows="10" class="form-control">

</textarea>
</div>


<div class="card-footer">
<div class="row">

<div class="col-6">
<a href="index.php" class="btn btn-danger btn-lg">Cancel</a>
</div>

<div class="col-6">
<button class="btn btn-success btn-lg" type="submit">Attempt Dispatch</button>
</div>

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

