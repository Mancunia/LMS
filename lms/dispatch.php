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
</div>

<br>

<div class="col-md-9 card " style="width:80rem;">

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
<br>
<div class="row">
Signature: <canvas id="signature-pad" class="sign_canvas"  style="border:1px solid #000000; border-radius:5px; width:100%; height:50%;">
</canvas>
</div>




</div>
<br>
<div class="">
<div class="row">

<div class="col-6">
<a href="index.php" class="btn btn-danger btn-lg">Cancel</a>
</div>

<div class="col-6">
<button class="btn btn-success btn-lg" type="submit">Attempt Dispatch</button>
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

