// function getDispatch(str){
//     console.log(str);
//     if (str == "") {
//         document.getElementById("txtHint").innerHTML = "";
//         return;
//     } else {
//         if (window.XMLHttpRequest) {
//             // code for IE7+, Firefox, Chrome, Opera, Safari
//             xmlhttp = new XMLHttpRequest();
//         } else {
//             // code for IE6, IE5
//             xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//         }
//         xmlhttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {
//                 document.getElementById("form").innerHTML = this.responseText;
//             }
//         };
//         xmlhttp.open("GET","getDispatching.php?dispatch_id="+str,true);
//         xmlhttp.send();
//     }
// }