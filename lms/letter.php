<?php



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
}

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
    <div class="row">
      <i class="fas fa-envelope">:<?php echo  $letter_id; ?></i>

    </div>

    <div style="float:right;">

    <?php
    echo'
     <a href="dispatch.php?letter='.$letter_id.'"><i class="fa fa-share" aria-hidden="true"></i>
               
               </a>';


    ?>
   
    </div>
  
  </div>
  <div class="card-body">
  <div class="">
  <div class="container">
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

        <div class="col-4 row">
          <?php
        echo '
         Sender: <b>'.$sender.'</b>
      
        ';
        ?>
        </div>

        <div class="col-4 row">
          Reference:<?php
        echo '
        <div class="">
        <b>'.$ref.'</b>
        </div>
        ';
        ?>
        </div>
        
        <div class="col-4 row">
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

