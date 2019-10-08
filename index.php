<?php

include "header.php";

?>


<body>
<?php
include 'nav.php';
?>

<!-- Page content -->
<div class="content">
<!-- first row for inserting -->
  <div class="row">

  <div class="col-6" >
  <!-- Add letter -->
<a>
<div class="card bg-dark text-white">
  <img src="images/envelope_add.png" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
    
  </div>
</div>
 </a>

  </div>

  <div class="col-6">
  <!-- Dispatch letters -->
  <a>
  <div class="card bg-dark text-white">
  <img src="images/envelope_minus.png" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
    
  </div>
</div>
 </a>
  </div>
  </div>
  <!-- End of first row -->

  <!-- second row for viewing -->
  <div class="row">

  <div class="col-6 ">
  <!-- View Received letters -->
  <a>
  <div class="card bg-transparent text-white">
  <img src="images/envelope_open.png" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
    
  </div>
</div>
 </a>
  </div>

  <div class="col-6">
  <!-- View Dispatched letters -->
  <a>
  <div class="card bg-transparent text-white">
  <img src="images/envelope_closed.png" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
  </div>
</div>
 </a>
  </div>
  </div>
  <!-- End of second row -->

</div>
</body>