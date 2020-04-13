$("#source1").mouseout(function(){

    var sel=$("#source1").val();
if(sel==1){
(this).hide(1000,function(){
    $("#source2").show(1000).attr("name", "source");
});
    
}

else{
    $(this).attr("name", "source");
}

});




// function priv(){
//     var s1=document.getElementById("source1");
//     var s2=document.getElementById("source2");
//     var val=document.getElementById("select").value;
//     if (val==1){

//  s1.hide(1000,function(){
//         s2.show(1000,function(){
//             s2.setAttribute("name","source");
//         });
//     });

//     }
//     else{
//         s1.setAttribute("name","source");
//     }

   
    

// }
var str;
function ch_empty(str){
    if(str.value==""){
        alert(str+" is not supposed to be empty");
    }

}