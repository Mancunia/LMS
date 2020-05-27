var id;
var str;
var office= office_id ;


//.....................Extras..............................................
function _Count(str){

    id= $('#'+str+' tr').length;
    if (id==0){
        $('#'+str).hide(500);
    }
    else{
        return id;
    }

}

// .......................Basic stuff .............................

function loadReceived(str){

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText==""){
               ;
                $("#received_table").html(responds(1));
            }
            else{

                $("#received_table").html(this.responseText);
                $("#ceived").html(_Count("received_table"));
            }
        }
    };
    xmlhttp.open("GET","ajax/controller.php?received="+str,true);
    xmlhttp.send();

}

function loadDispatching(str){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText==""){
                $("#dispatching_table").html("<b center><i class='fa fa-times' aria-hidden='true'>Nothing show</i></b>");
            }
            else{
                $("#dispatching_table").html(this.responseText);
                $("#patching").html(_Count("dispatching_table"));

        $("#canvas").attr('height', $("#canvasDiv").outerHeight());
        $("#canvas").attr('width',482);
        
        if (typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
        }
        $("#canvasDiv").css("display","none");
            }
        }
    };
    xmlhttp.open("GET","ajax/controller.php?dispatching="+str,true);
    xmlhttp.send();

}


function loadDispatched(str){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText==""){
                // console.log('no show');
                $("#dispatched_table").html("<b center><i class='fa fa-times' aria-hidden='true'>Nothing show</i></b>");
            }
            else{
                // do {
                    
                // } while (condition);

                $("#dispatched_table").html(this.responseText);
                $("#patched").html(_Count("dispatched_table"));
            }
            
        }
    };

    xmlhttp.open("GET","ajax/controller.php?dispatched="+str,true);
    xmlhttp.send();
}



// ............................. Actions by trigger....................................


function getDispatch(str){
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
                $("#form").html(this.responseText);
                
            }
        };
        xmlhttp.open("GET","ajax/controller.php?dispatch_id="+str,true);
        xmlhttp.send();
    }
}


function updateDispatch(str){

    
  
  var receive = document.getElementById("receiver").value;

//   var patching = document.getElementById("patching").innerHTML;

  if(receive==""){
      
                // $("#heading").html("Please add Receiver name ");
                // $("#reason").html("Please make sure to fill all the required fields");
                // $(".alert ").attr("class","alert alert-warning");
                // $(".alert").show();
                // $(".alert").hide(5000);
                $("#re_ce").show(1000);
                $("#re_ce").attr("class","badge badge-danger badge-pill");
                 document.getElementById("re_ce").innerHTML="please enter a receiver";
                 $("#receiver").css("border-color","red");
  }
  else{
    var mycanvas = document.getElementById('canvas');
    var img = mycanvas.toDataURL();

    if(img===""){

        $("#canvasDiv").css("border-color","red");

    }
    
    else{
        console.log(img);
    
        var lf_id = str;


        $.ajax({
            type: "POST",
            url: "ajax/controller.php",
            data: { 
                dispatching:lf_id,
                receiver: receive,
                 sign: img
            },
            beforeSend:function(){
                if(!img||!receive||!lf_id){
                    alert("Something went wrong");
                    responds("error");

                }

            },
            success:function(){
                alert("this is the success callback");
            

            },
            error:function(){
                responds("error");
            }
          }).done(function() {
           
                // $(".alert").fade(5000);
                $(".close").click();
     
             loadDispatching(office);
             
             loadDispatched(office);
            

          

            
          });

    }

            
            
          
  }
  
}



function responds(str){

    switch (str) {
        case "error":
            
            icon.setAttribute('class', 'fa fa-times fa-3x');

            $("#heading").html("Something went wrong! ");
                $("#reason").html("Request couldn't go through");
                $(".alert ").attr("class","alert alert-danger");
                $(".alert").show(2000);
            break;
        
        case "request_failed":
            
            icon.setAttribute('class', 'fa fa-times fa-3x');

                $(".alert ").attr("class","alert alert-warning");
                 $("#heading").html("Something went wrong! ");
            $("#reason").html("Request couldn't go through");
            $(".alert").show(2000);
        
        break;

        case "success":
           
            icon.setAttribute('class', 'fa-li fa fa-check-square fa-3x');
            
            $("#heading").html("Great! ");
                    $("#reason").html("Action was Successfully Performed");
                    $("#reason").appendChild(icon);
                    $(".alert ").attr("class","alert alert-success");
                    $(".alert").show(2000);


        
            break;
        case "loading":

        icon.attr('class', 'fa fa-circle-o-notch fa-spin fa-3x fa-fw');
        


            $("#heading").html("Great! ");
            $("#reason").html("loading");
           
            $(".alert ").attr("class","alert alert-success");
            $(".alert").show(2000);

        break;
    
        default:
            break;
    }
}


function dispatch(){
    
}







//........................fire up.............................
$(document).ready(function(){
    $(".alert").hide();
    // $("#canvasDiv").css("display","none");

    // $("#canvasDiv").css("display","none");

$(document).on('click','#next',function(){
    var receive = document.getElementById("receiver").value;
    
      if(receive==""){
                    $("#re_ce").attr("class","badge badge-danger badge-pill");
                     document.getElementById("re_ce").innerHTML="please enter a receiver";
                     $("#receiver").css("border-color","red");
      }
      else{
          $("#mod").hide(1000,function(){
            $("#canvasDiv").css("display","block");
            $("#next").hide(1000);
            $("#final").show(1000);

          });
      }

});

$(document).on('click','.close',function(){
    $("#reset-btn").click();
    console.log("cleared canvas");
    $("#canvasDiv").css("display","none");

});
    


loadReceived(office);
loadDispatched(office);
loadDispatching(office);









// ............................. Actions by trigger....................................


$("#receiver").on('mouseout',function(){
    alert('Text1 changed!');

    // if($("#receiver").val()){

    //     $("#canvasDiv").toggle(1000);
    // }
    // else{
    //     $("#reset-btn").click();
    // }
        


    });


    $(document).bind("ajaxSend", function(){
        responds("loading");

      }).bind("ajaxComplete", function(){
         responds("success");
      }).bind("ajaxError",function(){

      });





});
