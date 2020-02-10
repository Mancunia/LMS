<?php



include_once 'requires/header.php';

?>



  

   <?php

   include_once 'requires/heading.php';

   ?>

<!-- letter itself -->
<div class=" " id="letter_head">
  <div>

  </div>
<div class="card">
  <div class="card-header">
  <i class="fas fa-envelope"></i>:
Letter id
  </div>
  <div class="card-body">
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

<hr>

<!-- letter life cycle -->
<div class="container" id="letter_life">
<center>
        <div class="col-md-9" style="width:100rem;">
<!-- ............................dispatched................................... -->
<div role="tabpanel" class="tab-pane" id="dispatched">

<div class="card mb-3">
<div class="card-header bg-light" id="dispatched">
 <i class="fas fa-history"></i>
 Life cycle</div>
<div class="card-body">
 <div class="table-responsive">
<table id="" class="display table table-hover" style="width:100%">
<thead>
<tr>
         <th>S/N</th>
         <th>Ref.No</th>
         <th>Subject</th>
         <th>From</th>
         <th>To</th>
         <th>Date</th>
         
       </tr>
</thead>
<tbody>
 
 <tr>
     <td>Shad Decker</td>
     <td>Regional Director</td>
     <td>Edinburgh</td>
     <td>51</td>
     <td>$183,000</td>
 </tr>
</tbody>
<tfoot>
<tr>
         <th>S/N</th>
         <th>Ref.No</th>
         <th>Subject</th>
         <th>From</th>
         <th>To</th>
         <th>Date</th>
         
       </tr>
</tfoot>
</table>
</div>
</div>
</div> 

</div>
</div>

</div>

  

  

        












         <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     <?php
     require_once 'requires/footer.php';
     ?>

