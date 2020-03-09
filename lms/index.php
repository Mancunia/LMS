<?php



include_once 'requires/header.php';
$received=$lms_con->received($_SESSION['office']);




?>



  

   <?php

   include_once 'requires/heading.php';

   ?>


    

       <?php
       include_once 'includes/cards.php';
       ?>


      <!-- .................................................................................... -->

  


<div class="container">
  <div class="row">
    <div class="col-md-12"> 
      <!-- Nav tabs -->
      <div class="">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active nav_inlink"><a class=" btn btn-outline-primary" href="#received" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-arrow-down"></i>  <span>Received</span></a></li>
          <li role="presentation" class="nav_inlink "><a class=" btn btn-outline-warning" href="#dispatching" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-history"></i>  <span>Dispatching</span></a></li>
          <li role="presentation" class="nav_inlink "><a class=" btn btn-outline-success" href="#dispatched" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-arrow-up"></i>  <span>Dispatched</span></a></li>
          
        </ul>

        

        <!-- Tab panes -->
        <div class="tab-content">

 <!-- ............................received................................... -->
          <div role="tabpanel" class="tab-pane active" id="received">
            
          <div class="card mb-3">
          <div class="card-header bg-primary" id="received">
            <i class="fas fa-arrow-down"></i>
            Received</div>
          <div class="card-body">
            <div class="table-responsive">
      <table id="" class="display table table-hover" style="width:100%">
        <thead>
        <tr>
                    <th>S/N</th>
                    <th>Ref</th>
                    <th>Subject</th>
                    <th>From</th>
                    <th>Date</th>
                    <th>Action</th>
                    
                  </tr>
        </thead>
        <tbody>
            <?php

            while($r=mysqli_fetch_array($received)){

              echo '
              <td>'.$r['letter_id'].'</td>
                <td>'.$r['ref'].'</td>
                <td>'.$r['letter_subject'].' </td>
                <td>'.$r['source'].'</td>
                <td>'.$r['flow_date'].'</td>
              ';
              
              echo'<td>
              <div class="tooltip"> <i class="fa fa-eye" aria-hidden="true"></i>
  <div class="tooltiptext">
  <div>
  <div class="col.4">
  <h3>'.$r['letter_id'].'</h3>
  </div>
  <div class="col.8">
  Original Source:'.$r['org_source'].'
  Letter Date:'.$r['letter_date'].'
  Receiver:'.$r['receiver'].'
  </div>
  
  </div>
  </div>
</div>

              

              </td>';

            }

            ?>
            <tr>
                
                
            </tr>

        </tbody>
        <tfoot>
        <tr>
                    <th>S/N</th>
                    <th>Ref</th>
                    <th>Subject</th>
                    <th>From</th>
                    <th>Date</th>
                    <th>Action</th>
                    
                  </tr>
        </tfoot>
    </table>
</div>
</div>
</div>

          </div>

<!-- ............................dispatching................................... -->
          <div role="tabpanel" class="tab-pane" id="dispatching">
           
          <div class="card mb-3">
          <div class="card-header bg-warning" id="dispatching">
            <i class="fas fa-history"></i>
            Dispatching</div>
          <div class="card-body">
            <div class="table-responsive">
    <table id="" class="display table table-hover" style="width:100%">
        <thead>
        <tr>
                    <th>S/N</th>
                    <th>Ref.No</th>
                    <th>Subject</th>
                    <th>To</th>
                    <th>Date</th>
                    
                  </tr>
        </thead>
        <tbody>
            
            <tr>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>$103,500</td>
            </tr>
        </tbody>
        <tfoot>
        <tr>
                    <th>S/N</th>
                    <th>Ref.No</th>
                    <th>Subject</th>
                    <th>To</th>
                    <th>Date</th>
                    
                  </tr>
        </tfoot>
    </table>
    </div>
</div>
</div>
 

          </div>

<!-- ............................dispatched................................... -->
          <div role="tabpanel" class="tab-pane" id="dispatched">

           <div class="card mb-3">
          <div class="card-header bg-success" id="dispatched">
            <i class="fas fa-arrow-up"></i>
            Dispatched</div>
          <div class="card-body">
            <div class="table-responsive">
      <table id="" class="display table table-hover" style="width:100%">
        <thead>
        <tr>
                    <th>S/N</th>
                    <th>Ref.No</th>
                    <th>Subject</th>
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
    </div>
  </div>
</div>


      


      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     <?php
     require_once 'requires/footer.php';
     ?>


