<?php



include_once 'requires/header.php';
$received=$lms_con->getReceived($_SESSION['office']);
$dispatching=$lms_con->postDispatching($_SESSION['office']);

$no_received=mysqli_num_rows($received);
$no_dispatching=mysqli_num_rows($dispatching);



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
      //  include_once 'includes/cards.php';
       ?>



<div class="container my-4">
      
            <!-- Description -->
      
            <!-- Section: Live preview -->
            <section>
      
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item waves-effect waves-light">
                  <a class="nav-link btn btn-lg active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">
                  <i class="fa fa-arrow-down"></i>Received
                  <span class="badge badge-info">
                  <?php echo $no_received; ?>
                  </span>
                  </a>
                </li>

                <li class="nav-item waves-effect waves-light">
                  <a class="nav-link btn btn-lg " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                  <i class="fa fa-history"></i>Dispatching
                  <span class="badge badge-primary">
                  <?php echo $no_dispatching; ?>
                  </span>
                  </a>
                </li>

                <li class="nav-item waves-effect waves-light">
                  <a class="nav-link btn btn-lg " id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">
                  <i class="fa fa-arrow-up"></i>Dispatched
                  <span class="badge badge-success">0</span>
                  </a>
                </li>

              </ul>
              <div class="tab-content" id="myTabContent">

                <div class="tab-pane active fade show" id="home" role="tabpanel" aria-labelledby="home-tab">
                <!--Received -->
                <div class="card mb-3">
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


                <div class="tab-pane  fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <!--Dispatching -->
                <div class="card mb-3">
                <table id="" class="display table table-hover" style="width:100%">
        <thead>
        <tr>
                    <th>S/N</th>
                    <th>Ref.No</th>
                    <th>Subject</th>
                    <th>To</th>
                    <th>Date</th>
                    <th>Action</th>
                    
                  </tr>
        </thead>
        <tbody>
        <div id="dis_table">
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
              <div class="">
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
        </div>

        

            
           
        </tbody>
        <tfoot>
        <tr>
                    <th>S/N</th>
                    <th>Ref.No</th>
                    <th>Subject</th>
                    <th>To</th>
                    <th>Date</th>
                    <th>Action</th>
                    
                  </tr>
        </tfoot>
    </table>
                 </div> 
                  </div>


                <div class="tab-pane fade " id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <!--Dispatched -->
                <div class="card mb-3">
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
      
            </section>
            <!-- Section: Live preview -->
      
          </div>
      

      <!-- .................................................................................... -->

  





      


      <!-- /.container-fluid -->


<script>

var id;
var str;
function getDispatch(str){
    // console.log(str);
    // console.log('haha');
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
        xmlhttp.open("GET","ajax/controller.php?dispatch_id="+str,true);
        xmlhttp.send();
    }
}

function updateDispatch(){
  
  var office='<?php echo $_SESSION['office']; ?>';
  var receiver = document.forms["dispatch_form"]["receiver"].value;

  if(receiver==""){
    document.getElementById("re_ce").setAttribute("class","badge badge-danger badge-pill");
  document.getElementById("re_ce").innerHTML="please enter a receiver";
  return 0;
  }
  else{
    var office='<?php echo $_SESSION['office']; ?>';
    var lf_id = document.forms["myForm"]["letter_id"].value;

      if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  do{
                    document.getElementById("dis_table").innerHTML="Please wait";

                  }
                  while(this.responseText=="");

                    document.getElementById("dis_table").innerHTML = this.responseText;
                }
            };

            xmlhttp.open("GET","ajax/update.php?update="+lf_id+"&receiver="+receiver+"&office="+office,true);


  }
  
}
</script>
      <!-- Sticky Footer -->
     <?php
     require_once 'requires/footer.php';
     ?>


