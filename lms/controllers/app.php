<?php
require 'conn.php';

class app_user{

    //Admin functions
    function newunit($unit,$acro,$depart)
    {

        $conn = Database::getInstance();
        $db = $conn->getConnection();

       mysqli_query($db," INSERT INTO `lms`.`unit` (`unit_name`, `unit_acronym`,`department_id`)
        VALUES ('$unit', '$acro','$depart')" );
       
    }

function newRole($role)
    {

        $conn = Database::getInstance();
        $db = $conn->getConnection();

       mysqli_query($db," INSERT INTO `lms`.`role` (`role_name`)
        VALUES ('$role')" );
       
    }

    function newDepartment($depart)
    {
        $conn = Database::getInstance();
        $db = $conn->getConnection();
       $feed=mysqli_query($db," INSERT INTO `lms`.`department` (`department_name`)
        VALUES ('$depart')" );
        if($feed){
            return "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Great</strong>Department <b>.$depart.</b> added
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </div>";

        }
        else{
            return "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>OOPS!</strong> Something went wrong 
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
        </div>
            ";
        }
       
    }



//Like-Admin functions
    function getUnit(){
try {
    //code...
    $conn = Database::getInstance();
        $db = $conn->getConnection();

        $result=mysqli_query($db,"SELECT f.unit_name as unit ,d.department_name as departments,f.unit_id FROM unit f join department d on f.department_id=d.department_id where f.status = 1 order by d.department_name ");
        
        return $result;  
}  
catch (PDOException $ex){
    echo $ex->getMessage();
    }
              
    }

    function getunits_id($d){
        try {
            //code...
            $conn = Database::getInstance();
                $db = $conn->getConnection();
        
                $result=mysqli_query($db,"SELECT f.*,d.* FROM unit f join department d on f.department_id=d.department_id where f.department_id='$d' ");
                
                return $result;  
        }  
        catch (Exception $ex){
            echo $ex->getMessage();
            }
                      
            }


            function exMyunit($unit_id){
                try {
                    //code...
                    $conn = Database::getInstance();
                        $db = $conn->getConnection();
                
                        $result=mysqli_query($db,"SELECT f.unit_name as unit ,d.department_name as departments,f.unit_id FROM unit f join department d on f.department_id=d.department_id where f.status = 1 and f.unit_id !='$unit_id' order by d.department_name ");
                        
                        return $result;  
                }  
                catch (PDOException $ex){
                    echo $ex->getMessage();
                    }

            }


    function getDepartment(){
        $conn = Database::getInstance();
        $db = $conn->getConnection();

        return mysqli_query($db,"SELECT * FROM department");
         

    }
    
    //get staff
    function getStaff($unit){
        try{
            $conn = Database::getInstance();
        $db = $conn->getConnection();
            if($unit==1){
                $result=mysqli_query($db,"SELECT * FROM users where unit>=2");
                // return $result; 
            }
            else{
            $result=mysqli_query($db,"SELECT * FROM users where role='staff' and unit='$unit'");
            }
            return $result;
        }
        catch (PDOException $ex){
            echo $ex->getMessage();
            }

    }

//Add new account
    function newPerson($username,$fname,$lname,$dob,$emp_num,$phone1,$phone2,$address,$rank,$email)
    {
        try{
// echo $username;

            $conn = Database::getInstance();
        $db = $conn->getConnection();
// echo $fname;
        $chk=mysqli_query($db,"SELECT * FROM user where `username`='$username'");
        $row=mysqli_num_rows($chk);
        
        if($row>0){
           echo"
           <div class='alert alert-danger alert-dismissible fade show' role='alert'>
           <strong>OOPs!</strong> Username Taken <b>NOTE!</b> Check all details
           <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
           <span aria-hidden='true'>&times;</span>
           </button>
           </div>
           ";
        }

        else {
            $sid=mysqli_query($db,"SELECT * FROM person where employee_number='$emp_num'");
            if(mysqli_num_rows($sid)>=1){
                echo"
           <div class='alert alert-danger alert-dismissible fade show' role='alert'>
           <strong>OOPs!</strong> The staff ID is already taken <b>NOTE!</b> Check all details
           <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
           <span aria-hidden='true'>&times;</span>
           </button>
           </div>
           "; 
            }
            else{
                if(strlen($emp_num)<4||strlen($emp_num)>9){
                   echo"
           <div class='alert alert-danger alert-dismissible fade show' role='alert'>
           <strong>OOPs!</strong> The staff ID isn't within valid range <b>NOTE!</b> Check all details
           <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
           <span aria-hidden='true'>&times;</span>
           </button>
           </div>
           ";   
                }
                else{
                    if (!preg_match("/^[G0-9].*[A-Z0-9]$/im", $emp_num)) {
                        return "
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                       <strong>Attention!</strong> Staff ID isn't valid 
                     <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                     </div>
                    ";
                    }
                    else{
                        $feed=mysqli_query($db,"INSERT INTO `lms`.`person` (`first_name`, `last_name`, `rank_id`, `dob`, `employee_number`, `phone`, `phone_2`, `address`, `email`, `created_date`) 
                VALUES ('$fname', '$lname', '$rank', '$dob', '$emp_num', '$phone1', '$phone2', '$address', '$email',NOW())");
            // echo $rank;
            // VALUES ('$fname', '$lname', '$rank','$dob', '$emp_num', '$phone1','$phone2', '$address', '$email',NOW()) ");
            if (!$feed){
            echo"
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>OOPs!</strong> There is something wrong <b>NOTE!</b> Check all details
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>
            ";
            }
            else{
            $last_id=mysqli_query($db," SELECT `person_id` FROM `lms`.person ORDER BY person_id DESC LIMIT 1");
            $last_id=mysqli_fetch_array($last_id);
            $pid=$last_id['person_id'];
            // echo $pid;
            return $pid;
            }
                    } 
                    
                }



                // echo $lname;

            }

}
        }
        catch (PDOException $ex){
            echo $ex->getMessage();
            }
    }

    function addRank($rank,$page){

        $conn = Database::getInstance();
        $db = $conn->getConnection();

        $result=mysqli_num_rows(mysqli_query($db,"SELECT * FROM rank where rank_title='$rank'"));
        if($result>0){
            return"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>OOPs!</strong> Rank already exists <b>NOTE!</b> Look through list 
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>&times;</span>
</button>
</div>
            ";
        }
        else{
            mysqli_query($db,"INSERT INTO `lms`.`rank` (`rank_title`) VALUES ('$rank')");

            header("Location:".$page);

        }
    }


    function newUser($pers_id,$username,$role,$unit,$acnt,$by){
//New user acount
 $conn = Database::getInstance();
        $db = $conn->getConnection();

        // echo $pers_id;
        if($pers_id==0){
          return"
<div class='alert alert-danger alert-dismissible fade show' role='alert'>
<strong>OOPs!</strong> There is something wrong <b>NOTE!</b>, Check all details
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>&times;</span>
</button>
</div>
";  
        }
        else{

            $feed=mysqli_query($db," INSERT INTO `lms`.`user` (`username`, `password`, `person_id`, `role`, `grp_id`, `unit_id`, `date_created`, `created_by`) 
        VALUES ('$username', '$username', '$pers_id', '$role', '$acnt', '$unit', NOW(), '$by')");
        

        if($feed){

return"
<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>Great!</strong> User: ".$username."'s account has been created successfully,<b>NOTE!</b> password is username
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>&times;</span>
</button>
</div>
";
}
else{
    return"
<div class='alert alert-danger alert-dismissible fade show' role='alert'>
<strong>OOPs!</strong> There is something wrong <b>NOTE!</b>, Check all details
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>&times;</span>
</button>
</div>
";

}
        }

        



}

function getUserByunit($unit){
    $conn = Database::getInstance();
    $db = $conn->getConnection();

    $result=mysqli_query($db,"SELECT u.*,p.*,r.rank_title FROM user u join person p on u.person_id=p.person_id join rank r on p.rank_id=r.rank_id where u.unit_id='$unit' and u.grp_id<>4");
$count=mysqli_num_rows($result);
// if ($count>=1){
return $result;
// }
// else{
// echo "<script>
// alert('Nothing to show')
// </script>";
// }

// header ("Location:./index.php");

}

function getUserAdmin(){
    $conn = Database::getInstance();
    $db = $conn->getConnection();

    $result=mysqli_query($db,"SELECT u.*,p.*,r.rank_title FROM user u join person p on u.person_id=p.person_id join rank r on p.rank_id=r.rank_id where u.grp_id<>4");
$count=mysqli_num_rows($result);
// if ($count>=1){
return $result;
// }
// else{
// echo "<script>
// alert('Nothing to show')
// </script>";
// }

// header ("Location:./index.php");

}

function getUserAdmin_id($unit){
    $conn = Database::getInstance();
    $db = $conn->getConnection();

    $result=mysqli_query($db,"SELECT u.*,p.*,r.rank_title FROM user u join person p on u.person_id=p.person_id join rank r on p.rank_id=r.rank_id where u.grp_id<>4 and u.unit_id='$unit'");
$count=mysqli_num_rows($result);
// if ($count>=1){
return $result;
// }
// else{
// echo "<script>
// alert('Nothing to show')
// </script>";
// }

// header ("Location:./index.php");

}


    /*
    |
    |
    |
    */

//check and login 
    function login($username,$password){
try{
    $conn = Database::getInstance();
    $db = $conn->getConnection();

$results=mysqli_query($db,"SELECT u.*,d.department_id FROM users u join unit f on f.unit_id=u.unit_id join department d on f.department_id=d.department_id  WHERE userName='$username' AND password='$password'");
   //fetch into an array
    $result=mysqli_fetch_array($results);
    return $result;
}
catch (PDOException $ex){
        echo $ex->getMessage();
        }
    }
    

    function lastLogin($user){
        $conn = Database::getInstance();
        $db = $conn->getConnection();

            // FLY payment
        mysqli_query($db,"UPDATE `lms`.`user` SET `last_login`=NOW() WHERE `user_id`='$user'
        ");

    }

    function lastLogout($user){
        $conn = Database::getInstance();
        $db = $conn->getConnection();

            // FLY payment
        mysqli_query($db,"UPDATE `lms`.`user` SET `last_logout`=NOW() WHERE `user_id`='$user'
        ");

    }


    function resetPassword($pass,$user){
        $conn = Database::getInstance();
        $db = $conn->getConnection();

        mysqli_query($db,"UPDATE `lms`.`user` SET `password`='$pass' WHERE `user_id`='$user'
        ");
        echo"
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Great!</strong> Password changed successfully <a href='logout.php?logout'>Login</a>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
    </div>
        ";

    }

    //get Roles
    function getRole(){
        $conn = Database::getInstance();
        $db = $conn->getConnection();
        $result=mysqli_query($db,"SELECT * from role where status=1");
        return $result;
    }

    //get Ranks
    function getRank(){
        $conn = Database::getInstance();
        $db = $conn->getConnection();
        $result=mysqli_query($db,"SELECT * from rank");
        return $result;
    }

    //get groups
    function getGroup(){
        $conn = Database::getInstance();
        $db = $conn->getConnection();
        $result=mysqli_query($db,"SELECT * from `group`");
        return $result;
    }










    //deactivate account
    function acntOff($userid){
        try{   
            $conn = Database::getInstance();
        $db = $conn->getConnection();

            // Dea
        mysqli_query($db,"UPDATE `lms`.`user` SET `status`='0' WHERE `user_id`='$userid'
        ");
   
return "
<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Great!</strong> User has been Deactivated
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
    </div>
";
        }
        catch (Exception $e){
    $error = $e->getMessage();
    echo $error;
}
    }




    //activate account
    function acntOn($userid){
        try{   
            $conn = Database::getInstance();
            $db = $conn->getConnection();

            // activate
        mysqli_query($db,"UPDATE `lms`.`user` SET `status`='1' WHERE `user_id`='$userid'
        ");
   
return "
<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Great!</strong> User has been Activated
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
    </div>
";
        }
        catch (Exception $e){
    $error = $e->getMessage();
    echo $error;
}
    }





    function getMenu($userid){

        try{   
            $conn = Database::getInstance();
            $db = $conn->getConnection();

            // activate
        $result=mysqli_query($db," SELECT * from menu m join menu_link ml on m.menu_id=ml.menu_id where ml.user_id='$userid'; ");
        
        return $result;
        }
        catch (Exception $e){
            $error = $e->getMessage();
         echo $error;
        }


    }




       

}

 /*................................................. Letter controls ................................................ */
   
class lms_con{

    // truncate string at word
      function trim($string) {  
    
        $limit=30;
        $break=" ";
        
        if (strlen($string) <= $limit) return $string;
        
        if (false !== ($max = strpos($string, $break, $limit))) {
             
            if ($max < strlen($string) - 1) {
                
                $string = substr($string, 0, $max) . $pad;
                
            }
            
        }
        
        return $string;
        
        }

        function post_letter($ref, $source, $sender, $l_date, $send_addr, $receiver_addr, $subject){
            
            try{
                $conn = Database::getInstance();
                $db = $conn->getConnection();
                // $s_type=gettype($source);
                // if($s_type=="string"){


                // }
                // else{
                    
                // }
                $stat=mysqli_query($db,"INSERT INTO `letter` (`letter_subject`, `letter_ref`, `letter_source`, `sender`, `send_address`, `receiver_address`, `letter_date`, `date`) 
                VALUES ('$subject','$ref','$source','$sender','$send_addr','$receiver_addr','$l_date', NOW())");
                

                // INSERT INTO `lms`.`letter` (`letter_subject`, `letter_ref`, `letter_source`, `sender`, `send_address`, `receiver_address`, `letter_date`, `date`) VALUES ('sub', 'ref', 'l_source', 'sender', 'send_addr', 'receiver_addr', 'l_date', 'now');

                if($stat){
                    $letter_id=mysqli_fetch_array(mysqli_query($db,"SELECT letter_id FROM letter ORDER BY letter_id DESC LIMIT 1"));
                    $l_id=$letter_id["letter_id"];

                    return $l_id;
                }
                else{
                    echo "
<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Hmmm!</strong> Something went wrong Letter was not Uploaded.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
    </div>
";
                }

                

                
            }
            catch(Exception $e){
                $error = $e->getMessage();
         echo $error;
            }

        }


        

        function dispatch($letter_id,$source,$destination, $receiver){
            try{
                $conn = Database::getInstance();
                $db = $conn->getConnection();


                //check if is already here 
                $where=mysqli_query($db,"SELECT * FROM letter_flow WHERE `letter_id`='$letter_id' AND `to`='$source' AND `here`=1 ");
                if(mysqli_num_rows($where)==1){
                    echo "here";
                    //leave unit 
                    $redir=mysqli_query($db,"UPDATE `letter_flow` SET `here`= 0 WHERE `letter_id`='$letter_id' AND `to`='$source' AND `here`=1");
                              if($redir){
                                return "
                                <div class='alert alert-info alert-dismissible fade show' role='alert'>
                                    <strong>Great!</strong> We are good to go
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button>
                                    </div>
                                ";  
                              }
                              else{
                                return "
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Great!</strong> Couldn't redir
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button>
                                    </div>
                                ";  
                              }
                }
                //Not here 
                else{
                    echo "here1 ";
                if($receiver==""){
                    echo "no rec";
                    $dis=mysqli_query($db,"INSERT INTO `letter_flow` (`letter_id`, `source`, `des`) 
                    VALUES ('$letter_id','$source','$destination')");
                }
                else{
                    echo " rec";
                     //Attempt dispatch
                    $dis=mysqli_query($db,"INSERT INTO `letter_flow` (`letter_id`, `source`, `des`, `receiver`) 
                    VALUES ('$letter_id','$source','$destination','$receiver')");
                }

                if($dis){
                    return "
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Great!</strong> We are good to go
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
        </div>
    ";
                }
                else{
                    return "
    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Hmmmmm.....</strong> Something isn't right
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
        </div>
    ";
                }

                   
                }
                
                    
            



            }
            catch(Exception $e){
                $error = $e->getMessage();
                echo $error;
            }
        }

        function received($unit_id){

            try{
                $conn = Database::getInstance();
                $db = $conn->getConnection();

                $here=mysqli_query($db,"
                select f.source  , f.receiver,l.letter_id, l.letter_subject , l.letter_ref as ref, l.letter_source as org_source, l.letter_date, f.date as flow_date
                from letter_flow f join letter l 
                on l.letter_id=f.letter_id
                where des = '$unit_id' and here=1 and receiver is not null and signature is not null
                ");

                return $here;
                
            }

            catch(Exception $e){
                $error = $e->getMessage();
                echo $error;
            }
        }


        function getLetter($id){
            try{
                $conn = Database::getInstance();
                $db = $conn->getConnection();

                 $here=mysqli_query($db,"
               select l.letter_id, l.letter_subject, l.letter_ref, u.unit_name, l.sender, l.send_address, l.receiver_address, l.letter_date from letter l
                join unit u 
                on l.letter_source=u.unit_id
                where l.letter_id='$id'
                ");
                if($here){

                    return $here;
                }
                else{
                     return "
                     <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>OOPs!</strong> This is unsual no <b>Letter</b>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button>
                                    </div>
                     
                     ";
                }

               

            }
            catch(Exception $e){
                $error = $e->getMessage();
                echo $error;
            }

        }


        function getLetter_flow($id){


        }
















        

        

    
    
    
    
    
    
    
    
    }


/*..................................EXTRAS................................................*/
    class extras{
function get_user($id){
    //search for actual user id of a typed name
            try{
                $conn = Database::getInstance();
                $db = $conn->getConnection();

                $da_id=mysqli_query($db,"SELECT user_id FROM users where userName ='$id'");
                
                if(mysqli_num_rows($da_id)==1){

                    $user=mysqli_fetch_array($da_id);
                    $da_unit=$user['user_id'];
                    return $da_unit;
                }

                else{
                    $da_id=mysqli_query($db,"SELECT userName FROM users where user_id ='$id'");
                
                    if(mysqli_num_rows($da_id)==1){
    
                        $user=mysqli_fetch_array($da_id);
                        $da_unit=$user['userName'];
                        return $da_unit;
                    }
                }

            }
            catch(Exception $e){
                $error = $e->getMessage();
                echo $error;
            }
        }

        function get_unit($id){
            try{
                $conn = Database::getInstance();
                $db = $conn->getConnection();

                $da_id=mysqli_query($db,"SELECT unit_name FROM unit where unit_id ='$id'");
                
                if(mysqli_num_rows($da_id)==1){

                    $unit=mysqli_fetch_array($da_id);
                    $da_unit=$unit['unit_name'];

                    return $da_unit;
                }

                else{
                    return "Not a valid unit since it wasn't found";
                }

            
            }
            catch(Exception $e){
                $error = $e->getMessage();
                echo $error;
            }

        }



        function right_user($id){
            try{
                $conn = Database::getInstance();
                $db = $conn->getConnection();

                $da_id=mysqli_query($db,"SELECT user_id FROM users where userName ='$id' and status=1;");
                
                if(mysqli_num_rows($da_unit)==1){
                    
                    return $da_unit;
                }
                else{
                    return $unit;
                }

            }
            catch(Exception $e){
                $error = $e->getMessage();
                echo $error;
            }
        }
    }

?>