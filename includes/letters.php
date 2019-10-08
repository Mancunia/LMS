<?php
include 'conn.php';
class letters{
    


    function getDepartmentLetter($depart_id){
$conn=new Database();

    }

//Add new letter
    function addLetter($subject,$source,$date,$indepartment,$by){
        $conn=new Database();   
        $toLetter=mysqli_query($conn->getdbconnect(),"INSERT INTO `l_m_s`.`letter` (`subject`, `org_department`, `org_sender`, `org_receipient`,`org_date`) 
        VALUES ('$subject', '$indepartment', '$source', '$by','$date')");
        //check if letter was inserted successfully
        
        if($toLetter){
//get lastid from letter
            $last_id=mysqli_query($conn->getdbconnect(),"SELECT letter_ID FROM letter ORDER BY letter_ID DESC LIMIT 1");
$last_id=mysqli_fetch_array($last_id);
$id=$last_id['letter_ID'];

//insert into letter_flow
            $toflow=mysqli_query($conn->getdbconnect(),"INSERT INTO `l_m_s`.`letter_flow` (`from_user`, `to_user`, `letter_id`, `date_in`, `department_in`) 
            VALUES ('$source', '$by', '$last_id', '$date', '$indepartment')");
        }

        else{
            echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>OOPS!</strong> You are not connected.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </div>"; 
        }


    }



}


?>