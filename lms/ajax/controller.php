<?php 
require_once '../controllers/app.php';
$lms_con = new lms_con();
$extras= new extras();

// $dispatch_id=$_REQUEST['dispatch_id'];

if(isset($_POST['dispatching']) && isset($_POST['receiver'])&& isset($_POST['sign'])){

  //processing signature 
  
  $signature = $_POST['sign'];
    $signatureFileName = uniqid().'.png';
    $signature = str_replace('data:image/png;base64,', '', $signature);
    $signature = str_replace(' ', '+', $signature);
    $data = base64_decode($signature);
    $file = '../signature/'.$signatureFileName;
    file_put_contents($file, $data);

  echo"<script>
  alert('in da update');
  </script>";
  $receiver= $_POST['receiver'];
  $l_id=$_POST['dispatching'];
   $lms_con->updateLetter_flow($l_id,$receiver,$signatureFileName);
  

  
}



if(isset($_GET['dispatch_id'])){
    $result=$lms_con->getDispatch($_GET['dispatch_id']);
  
    $l=mysqli_fetch_array($result);
    $lf_id=$l['letter_flow_id'];
    $source=$l['source'];
    $letter_id=$l['letter_id'];
    $sender=$l['sender'];
    $destination=$l['des'];
    $date=$l['flow_date'];
    $s_addr=$l['send_address'];
    $r_addr=$l['receiver_address'];
    $subject=$l['letter_subject'];
    $ref=$l['letter_ref'];


    echo'
    
    <div class="container" style="margin-left:10px;">
    <div class="row col-md-12">

      <div class="col-md-5 jumbotron">
        <p>
           
        <div class="row">
        '.$r_addr.'
        </div>
       
        </p>
        
      </div>

      <div class="col-md-2"></div>

      <div class="col-md-5 jumbotron">
        <p>
          
        <div class="">
        '.$s_addr.'
        </div>
        </p>
      
      </div>


      

      
      </div>
      
      <div class="row container">
        

        <div class="col-md-12 row">
          Reference:
        <div class="">
        <b>'.$ref.'</b>
        </div>
        
        </div>
        
        

      </div>

      <div class=" row col-md-12 container jumbotron">
      <p>
    
        <div class="">
        '.$subject.'
        </div>
        


      </p>
      
      </div>
      </div>



      </div>
      <input hidden name="l_id" value="'.$lf_id.'" >








    <div class="container ">
    <div class="row">

    <div class="col-md-6">
    <label for="src" class="">From</label>
    <input type="text" name="src" class="form-control" value="'.$extras->get_unit($source).'" readonly>
    </div>

    <div class="col-md-6">
    <label for="des" class="">To</label>
    <input type="text" name="des" class="form-control" value="'.$extras->get_unit($destination).'" readonly>
    </div>

    </div>
     
    </div>

    <div class="container ">
    <div class="row">

    <div class="col-md-6">
        <label for="sender" class="">Sender</label>
        <input type="text" name="sender" class="form-control" value="'.$extras->get_user($sender).'" readonly>
        </div>

        <div class="col-md-6">
        <label for="receiver" class="">Receiver</label>
        <input type="text" name="receiver" id="receiver" class="form-control">
        <span id="re_ce"></span>
        </div>
        
    </div>
        </div>


        <div class="container">
        <div class="row">
        signature
        </div>
        </div>
        


        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary fa-pull-right" value="'.$lf_id.'" onclick="updateDispatch(this.value)">Dispatch</button>
      </div>

    ';
}















//loading content of table in realtime

if(isset($_GET['received'])){
  $received=$lms_con->getReceived($_GET['received']);

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

  

}

if(isset($_GET['dispatching'])){

  $dispatching=$lms_con->postDispatching($_GET['dispatching']);
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
}

if(isset($_GET['dispatched'])){

            $dispatched=$lms_con->getDispatched($_GET['dispatched']);
            $n=1;
            while($r=mysqli_fetch_array($dispatched)){
              
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
               
              
               
              </div>
              

              

              </td>
              
              </tr>
              ';
              $n++;

            }
}









?>