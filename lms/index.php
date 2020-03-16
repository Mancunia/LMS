<?php



include_once 'requires/header.php';
$received=$lms_con->getReceived($_SESSION['office']);
$dispatching=$lms_con->postDispatching($_SESSION['office']);




?>



  

   <?php

   include_once 'requires/heading.php';

   ?>
   <!--........................Modal.............................-->
   
   <div class="modal fade example-modal-lg" id="dispatchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Dispatching</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="form" class="container-fluid">
        
        </div>
      </div>
      
      
    </div>
  </div>
</div>


   <!--........................Modal.............................-->

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
            $n=1;
            while($r=mysqli_fetch_array($received)){
              
              $receiver=$extras->get_user($r['receiver']);
              $unit=$extras->get_unit($r['source']);

              $tool_tip='
              Letter ID: '.$r['letter_id'].'
              Original Source: '.$r['org_source'].'
              Letter Date: '.$r['letter_date'].'
              Receiver: '.$receiver.'
              ';

              echo '
              <tr  data-toggle="tooltip" data-placement="bottom" title="'.$tool_tip.'">
              <td >'.$n.'</td>
                <td>'.$r['ref'].'</td>
                <td>'.$r['letter_subject'].' </td>
                <td>'.$unit.'</td>
                <td>'.$r['flow_date'].'</td>
              ';
              
              echo'<td>
              <div>
               <a href="letter.php?letter='.$r['letter_id'].'" title="view Letter"><i class="fa fa-eye" aria-hidden=""></i>
               
               </a>
               
               <a href="dispatch.php?letter='.$r['letter_id'].'" title="dispatch"><i class="fa fa-share" aria-hidden="true"></i>
               
               </a>
              </div>
              

              

              </td>
              
              </tr>';
              $n++;

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

        <?php
            $n=1;
            while($r=mysqli_fetch_array($dispatching)){
              
              // $receiver=$extras->get_user($r['receiver']);
              $unit=$extras->get_unit($r['des']);
              $source=$extras->get_unit($r['org_source']);

              $tool_tip='
              Letter ID: '.$r['letter_id'].'
              Original Source: '.$source.'
              Letter Date: '.$r['letter_date'].'
              ';

              echo '
              <tr  data-toggle="tooltip" data-placement="bottom" title="'.$tool_tip.'">
              <td >'.$n.'</td>
                <td>'.$r['ref'].'</td>
                <td>'.$r['letter_subject'].' </td>
                <td>'.$unit.'</td>
                <td>'.$r['flow_date'].'</td>
              ';
              
              echo'<td>
              <div>
               <a href="letter.php?letter='.$r['letter_id'].'" title="view Letter"><i class="fa fa-eye" aria-hidden=""></i>
               
               </a>
               
               <button data-toggle="modal" class="btn" data-target="#dispatchModal" value="'.$r['letter_flow_id'].'" onclick="getDispatch(this.value)" title="dispatch"><i class="fa fa-share" aria-hidden="true"></i>
               
               </button>
               
              </div>
              

              

              </td>
              
              </tr>';
              $n++;

            }

            ?>

            
           
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

<script>
function getDispatch(str){
    console.log(str);
    console.log('haha');
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("form").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/getDispatching.php?dispatch_id="+str,true);
        xmlhttp.send();
    }
}
</script>
      <!-- Sticky Footer -->
     <?php
     require_once 'requires/footer.php';
     ?>


