<?php
require_once '../controllers/app.php';
$lms_con = new lms_con();
$extras= new extras();

if(isset($_GET['update']) && isset($_GET['receiver']) && isset($_GET['office'])){

$receiver=$extras->get_user($_GET['receiver']);

$result=$lms_con->updateLetter_flow($_GET['update'],$receiver);

if($result==$_GET['update']){

  $dispatching=$lms_con->postDispatching($_GET['office']);
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
}



}