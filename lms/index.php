<?php



include_once 'requires/header.php';


// $no_received=mysqli_num_rows($received);
// $no_dispatching=mysqli_num_rows($dispatching);
// $no_dispatched=mysqli_num_rows($dispatched);




// if(isset($_GET['l_id'])&isset($_GET['src'])&isset($_GET['des'])& isset($_GET['sender'])&isset($_GET['receiver'])){
//   $lms_con->updateLetter_flow($_GET['l_id'],$_GET['receiver']);
// }


?>

<script>
var office_id= "<?php echo $_SESSION['office'];?>";
</script>



  

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
                  <a class="nav-link btn btn-lg active" id="home-tab" data-toggle="tab" href="#received" role="tab" aria-controls="home" aria-selected="false">
                  <i class="fa fa-arrow-down"></i>Received
                  <span class="badge badge-info">
                  <div id="ceived">
                  
                  </div>
                  
                  </span>
                  </a>
                </li>

                <li class="nav-item waves-effect waves-light">
                  <a class="nav-link btn btn-lg " id="profile-tab" data-toggle="tab" href="#dispatching" role="tab" aria-controls="profile" aria-selected="false">
                  <i class="fa fa-history"></i>Dispatching
                  <span class="badge badge-primary">
                  <div id="patching">
                  
                  </div>
                  
                  </span>
                  </a>
                </li>

                <li class="nav-item waves-effect waves-light">
                  <a class="nav-link btn btn-lg " id="contact-tab" data-toggle="tab" href="#dispatched" role="tab" aria-controls="contact" aria-selected="true">
                  <i class="fa fa-arrow-up"></i>Dispatched
                  <span class="badge badge-success">
                  <div id="patched">
                  
                  </div>
                  
                  </span>
                  </a>
                </li>

              </ul>
              <div class="tab-content" id="myTabContent">

                <div class="tab-pane active fade show" id="received" role="tabpanel" aria-labelledby="home-tab">
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
        <tbody id="received_table">
            <!-- received table -->
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


                <div class="tab-pane  fade" id="dispatching" role="tabpanel" aria-labelledby="profile-tab">
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
        <tbody id="dispatching_table">

        <!-- dispatching table -->

            
           
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


                <div class="tab-pane fade " id="dispatched" role="tabpanel" aria-labelledby="contact-tab">
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
        <tbody id="dispatched_table">
        
              <!-- dispatched table -->

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
// $(document).ready(function(){

</script>

<!-- <script>


alert("hello world");

});

</script> -->
      <!-- Sticky Footer -->
     <?php
     require_once 'requires/footer.php';
     ?>


