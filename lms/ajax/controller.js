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
  
  var receiver = document.getElementById("receiver").value;
//   var patching = document.getElementById("patching").innerHTML;

  if(receiver==""){
    document.getElementById("re_ce").setAttribute("class","badge badge-danger badge-pill");
  document.getElementById("re_ce").innerHTML="please enter a receiver";
  }
  else{
    
    var lf_id = str;
    

      if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                //   
                    loadDispatching(office);
                

                  
                    
                   

                }
                else{
                  console.log("No responds");
                }
            }
            // document.getELementById("dis_table").innerHTML=" ";
            xmlhttp.open("GETT","ajax/controller.php?dispatching="+lf_id+"&receiver="+receiver,true);
            xmlhttp.send();
            // console.log("request sent");
            // console.log(lf_id);
            // console.log(receiver);
            // console.log(office);
  }
  
}



function responds(str){

    switch (str) {
        case 0:
            

           document.write("Something is wrong somewhere, please contact your supervisor");

            break;

        case 1:
            alert("Sorry no new letters");

        
            break;
    
        default:
            break;
    }
}







//........................fire up.............................
$(document).ready(function(){



loadReceived(office);
loadDispatched(office);
loadDispatching(office);









// ............................. Actions by trigger....................................








});
