[1mdiff --git a/css/lms.css b/css/lms.css[m
[1mindex ecae486..6e3af7e 100644[m
[1m--- a/css/lms.css[m
[1m+++ b/css/lms.css[m
[36m@@ -56,8 +56,8 @@[m [mbackground-color: rgba(0, 0, 0, 0.729);[m
 [m
 }[m
 [m
[31m-/* canvas{[m
[31m-    border:1px solid #000000;[m
[32m+[m[32m.mod_img{[m
[32m+[m[32m    border:10px solid #000000;[m
     border-radius: 5px;[m
     width:100%;[m
     height:150px;[m
[36m@@ -65,7 +65,10 @@[m [mbackground-color: rgba(0, 0, 0, 0.729);[m
     -moz-border-radius: 5px;[m
     -ms-border-radius: 5px;[m
     -o-border-radius: 5px;[m
[31m-} */[m
[32m+[m[32m    width:inherit;[m
[32m+[m[32m}[m[41m [m
[32m+[m
[32m+[m
 #canvasDiv{[m
     position: relative;[m
     border: 2px dashed grey;[m
[1mdiff --git a/lms/ajax/controller.js b/lms/ajax/controller.js[m
[1mindex fdc8fda..e985fad 100644[m
[1m--- a/lms/ajax/controller.js[m
[1m+++ b/lms/ajax/controller.js[m
[36m@@ -114,6 +114,7 @@[m [mfunction loadDispatched(str){[m
 [m
 [m
 function getDispatch(str){[m
[32m+[m[32m    console.log(str);[m
     if (str == "") {[m
         document.getElementById("txtHint").innerHTML = "";[m
         return;[m
[36m@@ -190,8 +191,8 @@[m [mfunction updateDispatch(str){[m
 [m
             },[m
             success:function(){[m
[31m-                alert("this is the success callback");[m
[31m-            [m
[32m+[m[32m                // alert("this is the success callback");[m
[32m+[m[32m                responds("success");[m
 [m
             },[m
             error:function(){[m
[36m@@ -222,13 +223,46 @@[m [mfunction updateDispatch(str){[m
 }[m
 [m
 [m
[32m+[m[32mfunction dispatched(str){[m
[32m+[m[32m    console.log(str);[m
[32m+[m[41m    [m
[32m+[m[32m    if (str == "") {[m
[32m+[m[32m        document.getElementById("txtHint").innerHTML = "";[m
[32m+[m[32m        return;[m
[32m+[m[32m    } else {[m
[32m+[m[32m        if (window.XMLHttpRequest) {[m
[32m+[m[32m            // code for IE7+, Firefox, Chrome, Opera, Safari[m
[32m+[m[32m            xmlhttp = new XMLHttpRequest();[m
[32m+[m[32m        } else {[m
[32m+[m[32m            // code for IE6, IE5[m
[32m+[m[32m            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");[m
[32m+[m[32m        }[m
[32m+[m[32m        xmlhttp.onreadystatechange = function() {[m
[32m+[m[32m            if (this.readyState == 4 && this.status == 200) {[m
[32m+[m[32m                $("#form").html(this.responseText);[m
[32m+[m[41m                [m
[32m+[m[32m            }[m
[32m+[m[32m        };[m
[32m+[m[32m        xmlhttp.open("GET","ajax/controller.php?dispatched_single="+str,true);[m
[32m+[m[32m        xmlhttp.send();[m
[32m+[m[32m    }[m
[32m+[m[41m    [m
[32m+[m[32m}[m
[32m+[m
[32m+[m
[32m+[m
[32m+[m
[32m+[m[32m//Responds and error handling feedbacks[m
[32m+[m
[32m+[m
[32m+[m
 [m
 function responds(str){[m
 [m
     switch (str) {[m
         case "error":[m
             [m
[31m-            icon.setAttribute('class', 'fa fa-times fa-3x');[m
[32m+[m[32m            $("#icon").setAttribute('class', 'fa fa-times fa-3x');[m
 [m
             $("#heading").html("Something went wrong! ");[m
                 $("#reason").html("Request couldn't go through");[m
[36m@@ -238,7 +272,7 @@[m [mfunction responds(str){[m
         [m
         case "request_failed":[m
             [m
[31m-            icon.setAttribute('class', 'fa fa-times fa-3x');[m
[32m+[m[32m            $("#icon").setAttribute('class', 'fa fa-times fa-3x');[m
 [m
                 $(".alert ").attr("class","alert alert-warning");[m
                  $("#heading").html("Something went wrong! ");[m
[36m@@ -249,11 +283,11 @@[m [mfunction responds(str){[m
 [m
         case "success":[m
            [m
[31m-            icon.setAttribute('class', 'fa-li fa fa-check-square fa-3x');[m
[32m+[m[32m            $("#icon").setAttribute('class', 'fa-li fa fa-check-square fa-3x');[m
             [m
             $("#heading").html("Great! ");[m
                     $("#reason").html("Action was Successfully Performed");[m
[31m-                    $("#reason").appendChild(icon);[m
[32m+[m[32m                    // $("#reason").appendChild(icon);[m
                     $(".alert ").attr("class","alert alert-success");[m
                     $(".alert").show(2000);[m
 [m
[36m@@ -262,7 +296,7 @@[m [mfunction responds(str){[m
             break;[m
         case "loading":[m
 [m
[31m-        icon.attr('class', 'fa fa-circle-o-notch fa-spin fa-3x fa-fw');[m
[32m+[m[32m            $("#icon").attr('class', 'fa fa-circle-o-notch fa-spin fa-3x fa-fw');[m
         [m
 [m
 [m
[36m@@ -280,9 +314,6 @@[m [mfunction responds(str){[m
 }[m
 [m
 [m
[31m-function dispatch(){[m
[31m-    [m
[31m-}[m
 [m
 [m
 [m
[36m@@ -310,12 +341,19 @@[m [m$(document).on('click','#next',function(){[m
             $("#canvasDiv").css("display","block");[m
             $("#next").hide(1000);[m
             $("#final").show(1000);[m
[32m+[m[32m            $("#reset-btn").css("display","block");[m
 [m
           });[m
       }[m
 [m
 });[m
 [m
[32m+[m[32m$(document).on('click','#final',function(){[m
[32m+[m[32m   if($("#receiver").val()==""){[m
[32m+[m[32m    $("#receiver").css('display','block');[m
[32m+[m[32m   }[m
[32m+[m[32m});[m
[32m+[m
 $(document).on('click','.close',function(){[m
     $("#reset-btn").click();[m
     console.log("cleared canvas");[m
[36m@@ -357,10 +395,10 @@[m [m$("#receiver").on('mouseout',function(){[m
 [m
 [m
     $(document).bind("ajaxSend", function(){[m
[31m-        responds("loading");[m
[32m+[m[32m        $("#dispatchModal").css("opaque","0");[m
 [m
       }).bind("ajaxComplete", function(){[m
[31m-         responds("success");[m
[32m+[m[32m        $("#dispatchModal").css("opaque","1");[m
       }).bind("ajaxError",function(){[m
 [m
       });[m
[1mdiff --git a/lms/ajax/controller.php b/lms/ajax/controller.php[m
[1mindex d6077ca..a8d3e00 100644[m
[1m--- a/lms/ajax/controller.php[m
[1m+++ b/lms/ajax/controller.php[m
[36m@@ -10,12 +10,12 @@[m [mif(isset($_POST['dispatching']) && isset($_POST['receiver'])&& isset($_POST['sig[m
   //processing signature [m
   [m
   $signature = $_POST['sign'];[m
[31m-    $signatureFileName = uniqid().'.png';[m
[31m-    $signature = str_replace('data:image/png;base64,', '', $signature);[m
[31m-    $signature = str_replace(' ', '+', $signature);[m
[31m-    $data = base64_decode($signature);[m
[31m-    $file = '../signature/'.$signatureFileName;[m
[31m-    file_put_contents($file, $data);[m
[32m+[m[32m    // $signatureFileName = uniqid().'.png';[m
[32m+[m[32m    // $signature = str_replace('data:image/png;base64,', '', $signature);[m
[32m+[m[32m    // $signature = str_replace(' ', '+', $signature);[m
[32m+[m[32m    // $data = base64_decode($signature);[m
[32m+[m[32m    // $file = '../signature/'.$signatureFileName;[m
[32m+[m[32m    // file_put_contents($file, $data);[m
 [m
 [m
   echo"<script>[m
[36m@@ -23,7 +23,7 @@[m [mif(isset($_POST['dispatching']) && isset($_POST['receiver'])&& isset($_POST['sig[m
   </script>";[m
   $receiver= $_POST['receiver'];[m
   $l_id=$_POST['dispatching'];[m
[31m-   $lms_con->updateLetter_flow($l_id,$receiver,$signatureFileName);[m
[32m+[m[32m   $lms_con->updateLetter_flow($l_id,$receiver,$signature);[m
   [m
 [m
   [m
[36m@@ -316,9 +316,9 @@[m [mif(isset($_GET['dispatched'])){[m
               [m
               echo'<td>[m
               <div class="">[m
[31m-               <a href="letter.php?letter='.$r['letter_id'].'" title="view Letter"><i class="fa fa-eye" aria-hidden=""></i>[m
[32m+[m[32m               <button data-toggle="modal" class="btn" data-target="#dispatchModal" value="'.$r['letter_flow_id'].'" onclick="dispatched(this.value)" title="View Letter"><i class="fa fa-eye" aria-hidden=""></i>[m
                [m
[31m-               </a>[m
[32m+[m[32m               </button>[m
                [m
               [m
                [m
[36m@@ -341,6 +341,154 @@[m [mif(isset($_GET['dispatched'])){[m
 [m
 [m
 [m
[32m+[m[32mif(isset($_GET['dispatched_single'])){[m
[32m+[m[32m  $result=$lms_con->getDispatch_final($_GET['dispatched_single']);[m
[32m+[m
[32m+[m[32m  $l=mysqli_fetch_array($result);[m
[32m+[m[32m    $lf_id=$l['letter_flow_id'];[m
[32m+[m[32m    $sign=$l['signature'];[m
[32m+[m[32m    $letter_id=$l['letter_id'];[m
[32m+[m[32m    $receiver=$l['receiver'];[m
[32m+[m[32m    $destination=$l['des'];[m
[32m+[m[32m    $date=$l['date'];[m
[32m+[m[32m    $s_addr=$l['send_address'];[m
[32m+[m[32m    $r_addr=$l['receiver_address'];[m
[32m+[m[32m    $subject=$l['letter_subject'];[m
[32m+[m[32m    $ref=$l['letter_ref'];[m
[32m+[m
[32m+[m[32m    // $data = base64_decode($sign);[m
[32m+[m
[32m+[m
[32m+[m[32m    //form[m
[32m+[m[32m    echo'[m
[32m+[m[41m    [m
[32m+[m[32m    <div id="mod">[m
[32m+[m[32m    <div class="container" align="left">[m
[32m+[m[32m    <strong style="font-size:20pt; background-color:rgba(0,0,0,0.4); border-radius:5px;">'.$letter_id.'</strong>[m
[32m+[m[32m    </div>[m
[32m+[m[32m    <div  class="container" style="margin-left:10px;">[m
[32m+[m[32m    <div class="row col-md-12">[m
[32m+[m
[32m+[m[32m      <div class="col-md-5 jumbotron">[m
[32m+[m[32m        <p>[m
[32m+[m[41m           [m
[32m+[m[32m        <div class="row">[m
[32m+[m[32m        '.$r_addr.'[m
[32m+[m[32m        </div>[m
[32m+[m[41m       [m
[32m+[m[32m        </p>[m
[32m+[m[41m        [m
[32m+[m[32m      </div>[m
[32m+[m
[32m+[m[32m      <div class="col-md-2"></div>[m
[32m+[m
[32m+[m[32m        <div class="col-md-5 jumbotron">[m
[32m+[m[32m        <p>[m
[32m+[m[41m          [m
[32m+[m[32m        <div class="">[m
[32m+[m[32m        '.$s_addr.'[m
[32m+[m[32m        </div>[m
[32m+[m[32m        </p>[m
[32m+[m[41m      [m
[32m+[m[32m      </div>[m
[32m+[m
[32m+[m
[32m+[m[41m      [m
[32m+[m
[32m+[m[41m      [m
[32m+[m[32m      </div>[m
[32m+[m[41m      [m
[32m+[m[32m      <div class="row container">[m
[32m+[m[41m        [m
[32m+[m
[32m+[m[32m        <div class="col-md-12 row">[m
[32m+[m[32m          Reference:[m
[32m+[m[32m        <div class="">[m
[32m+[m[32m        <b>'.$ref.'</b>[m
[32m+[m[32m        </div>[m
[32m+[m[41m        [m
[32m+[m[32m        </div>[m
[32m+[m[41m        [m
[32m+[m[41m        [m
[32m+[m
[32m+[m[32m    </div>[m
[32m+[m
[32m+[m[32m      <div class=" row col-md-12 container jumbotron">[m
[32m+[m[32m      <p>[m
[32m+[m[41m    [m
[32m+[m[32m        <div class="">[m
[32m+[m[32m        '.$subject.'[m
[32m+[m[32m        </div>[m
[32m+[m[41m        [m
[32m+[m
[32m+[m
[32m+[m[32m      </p>[m
[32m+[m[41m      [m
[32m+[m[32m      </div>[m
[32m+[m[41m      [m
[32m+[m
[32m+[m[32m<div class="container ">[m
[32m+[m[32m    <div class="row">[m
[32m+[m
[32m+[m[41m    [m
[32m+[m
[32m+[m[32m    <div class="col-md-6">[m
[32m+[m[32m    <label for="des" class="">To</label>[m
[32m+[m[32m    <input type="text" name="des" class="form-control" value="'.$extras->get_unit($destination).'" readonly>[m
[32m+[m[32m    </div>[m
[32m+[m[41m    [m
[32m+[m[32m    <div class="col-md-6">[m
[32m+[m[32m        <label for="sender" class="">Date</label>[m
[32m+[m[32m        <input type="text" name="sender" class="form-control" value="'.$date.'" readonly>[m
[32m+[m[32m        </div>[m
[32m+[m
[32m+[m
[32m+[m[32m    </div>[m
[32m+[m[41m     [m
[32m+[m[32m    </div>[m
[32m+[m[32m<hr>[m
[32m+[m[32m    <div class="container ">[m
[32m+[m[32m    <div class="row">[m
[32m+[m[32m        <div class="col-md-8 " style="border-color:black; border-radius:10px; border-width:10px;">[m
[32m+[m[32m          <img src="'.$sign.'" width="300">[m
[32m+[m
[32m+[m[32m        </div>[m
[32m+[m[41m    [m
[32m+[m
[32m+[m[32m        <div class="col-md-4">[m
[32m+[m[32m    <label for="src" class="">Receiver</label>[m
[32m+[m[32m    <input type="text" name="src" class="form-control" value="'.$receiver.'" readonly>[m
[32m+[m[32m    </div>[m
[32m+[m[41m        [m
[32m+[m[32m    </div>[m
[32m+[m
[32m+[m[32m        </div>[m
[32m+[m
[32m+[m[32m      </div>[m
[32m+[m[32m      <br>[m
[32m+[m
[32m+[m[41m      [m
[32m+[m
[32m+[m
[32m+[m
[32m+[m
[32m+[m
[32m+[m
[32m+[m
[32m+[m
[32m+[m[41m    [m
[32m+[m[41m        [m
[32m+[m
[32m+[m[32m</div>[m
[32m+[m[32m';[m
[32m+[m
[32m+[m[41m            [m
[32m+[m
[32m+[m
[32m+[m[32m}[m
[32m+[m
[32m+[m
[32m+[m
 [m
 [m
 [m
[1mdiff --git a/lms/controllers/app.php b/lms/controllers/app.php[m
[1mindex 6ff0755..bd63b5d 100644[m
[1m--- a/lms/controllers/app.php[m
[1m+++ b/lms/controllers/app.php[m
[36m@@ -768,7 +768,7 @@[m [mclass lms_con{[m
                 select f.source  , f.receiver,l.letter_id, l.letter_subject , l.letter_ref as ref, l.letter_source as org_source, l.letter_date, f.date as flow_date[m
                 from letter_flow f join letter l [m
                 on l.letter_id=f.letter_id[m
[31m-                where des = '$unit_id' and here=1 and receiver is not null and signature is not null[m
[32m+[m[32m                where des = '$unit_id' and here=1 and receiver is not null and signature is not null order by f.date desc[m
                 ");[m
 [m
                 return $here;[m
[36m@@ -882,6 +882,31 @@[m [mclass lms_con{[m
             }[m
         }[m
 [m
[32m+[m[32m        function getDispatch_final($id){[m
[32m+[m[32m            try{[m
[32m+[m[32m                $conn = Database::getInstance();[m
[32m+[m[32m                $db = $conn->getConnection();[m
[32m+[m[32m                $result=mysqli_query($db,"select lf.letter_flow_id, lf.des, lf.receiver, lf.signature, lf.date, lf.letter_id, l.letter_subject, l.letter_ref, l.send_address, l.receiver_address from letter_flow lf[m[41m [m
[32m+[m[32m                join letter l on lf.letter_id=l.letter_id[m
[32m+[m[32m                where lf.letter_flow_id = '$id' and lf.status=1 and lf.signature IS NOT NULL and lf.receiver IS NOT NULL");[m
[32m+[m[32m                if($result){[m
[32m+[m[32m                    return $result;[m
[32m+[m[32m                }[m
[32m+[m[32m                else{[m
[32m+[m[32m                    echo "[m
[32m+[m[32m                    <script>[m
[32m+[m[32m                    alert('Something isn't right');[m
[32m+[m[32m                    </script>[m
[32m+[m[32m                    ";[m
[32m+[m[32m                }[m
[32m+[m[41m                [m
[32m+[m[32m            }[m
[32m+[m[32m            catch(Exception $e){[m
[32m+[m[32m                $error = $e->getMessage();[m
[32m+[m[32m                echo $error;[m
[32m+[m[32m            }[m
[32m+[m[32m        }[m
[32m+[m
         function updateLetter_flow($id,$receiver,$sign){[m
             try{[m
 [m
[36m@@ -894,7 +919,7 @@[m [mclass lms_con{[m
                 // echo "hello";[m
                 $conn = Database::getInstance();[m
                 $db = $conn->getConnection();[m
[31m-                $result=mysqli_query($db,"UPDATE `lms`.`letter_flow` SET `receiver`='$receiver', `signature`='$sign' WHERE `letter_flow_id`='$id'[m
[32m+[m[32m                $result=mysqli_query($db,"UPDATE `lms`.`letter_flow` SET `receiver`='$receiver', `signature`='$sign',`date`=NOW() WHERE `letter_flow_id`='$id'[m
                 ");[m
                 //  echo "hell";[m
                 if($result){[m
[36m@@ -956,7 +981,7 @@[m [mclass lms_con{[m
                 from letter_flow lf join letter l[m
                 on lf.letter_id=l.letter_id join unit u[m
                 on u.unit_id=lf.source[m
[31m-                where lf.source='$id' and l