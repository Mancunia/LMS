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
        <div class="container">

        <div class="alert " role="alert">

          <h4 class="alert-heading" id="heading">
            <!-- Heading--> 
          </h4>

          <p id="reason">
            <!--Reason -->
           </p>
          
        </div>

          </div>

        </div>
      <form id="signatureform" action="" method="post">
      
        <div id="form" class="container-fluid">
        
        </div>
        
        <div class=" container row">
            <div class="col-md-8 col-md-offset-2">
                <br>
                <hr>
                <div id="canvasDiv"></div>
                <br>
                 <button type="button" class="btn btn-danger" id="reset-btn">Clear</button>
                <!--<button type="button" class="btn btn-success" id="btn-save">Save</button> -->
            </div>
            <!-- <form id="signatureform" action="" style="display:none" method="post">
                <input type="hidden" id="signature" name="signature">
                <input type="hidden" name="signaturesubmit" value="1">
            </form> -->
        </div>
                
            </form>
        
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



      <!-- Sticky Footer -->
     <?php
     require_once 'requires/footer.php';
     ?>

     <script>
    $(document).ready(() => {
        var canvasDiv = document.getElementById('canvasDiv');
        var canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'canvas');
        canvasDiv.appendChild(canvas);
        $("#canvas").attr('height', 300);
        $("#canvas").attr('width', 500);
        if (typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
        }
        
        context = canvas.getContext("2d");
        $('#canvas').mousedown(function(e) {
            var offset = $(this).offset()
            var mouseX = e.pageX - this.offsetLeft;
            var mouseY = e.pageY - this.offsetTop;

            paint = true;
            addClick(e.pageX - offset.left, e.pageY - offset.top);
            redraw();
        });

        $('#canvas').mousemove(function(e) {
            if (paint) {
                var offset = $(this).offset()
                //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
                addClick(e.pageX - offset.left, e.pageY - offset.top, true);
                console.log(e.pageX, offset.left, e.pageY, offset.top);
                redraw();
            }
        });

        $('#canvas').mouseup(function(e) {
            paint = false;
        });

        $('#canvas').mouseleave(function(e) {
            paint = false;
        });

        var clickX = new Array();
        var clickY = new Array();
        var clickDrag = new Array();
        var paint;

        function addClick(x, y, dragging) {
            clickX.push(x);
            clickY.push(y);
            clickDrag.push(dragging);
        }

        $("#reset-btn").click(function() {
            context.clearRect(0, 0, window.innerWidth, window.innerWidth);
            clickX = [];
            clickY = [];
            clickDrag = [];
        });

        $(document).on('click', '#btn-save', function() {
            var mycanvas = document.getElementById('canvas');
            var img = mycanvas.toDataURL("image/png");
            anchor = $("#signature");
            anchor.val(img);
            $("#signatureform").submit();
        });

        var drawing = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;

        canvas.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchmove", function(e) {

            var touch = e.touches[0];
            var offset = $('#canvas').offset();
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);



        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDiv, touchEvent) {
            var rect = canvasDiv.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
        }


        var elem = document.getElementById("canvas");

        var defaultPrevent = function(e) {
            e.preventDefault();
        }
        elem.addEventListener("touchstart", defaultPrevent);
        elem.addEventListener("touchmove", defaultPrevent);


        function redraw() {
            //
            lastPos = mousePos;
            for (var i = 0; i < clickX.length; i++) {
                context.beginPath();
                if (clickDrag[i] && i) {
                    context.moveTo(clickX[i - 1], clickY[i - 1]);
                } else {
                    context.moveTo(clickX[i] - 1, clickY[i]);
                }
                context.lineTo(clickX[i], clickY[i]);
                context.closePath();
                context.stroke();
            }
        }
    })

</script>



