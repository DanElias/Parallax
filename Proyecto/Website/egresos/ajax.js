function getRequestObject() {
  // Asynchronous objec created, handles browser DOM differences

  if(window.XMLHttpRequest) {
    // Mozilla, Opera, Safari, Chrome, IE 7+
    return (new XMLHttpRequest());
  }
  else if (window.ActiveXObject) {
    // IE 6-
    return (new ActiveXObject("Microsoft.XMLHTTP"));
  } else {
    // Non AJAX browsers
    return(null);
  }
}

function sendRequest(){

   request=getRequestObject();
   if(request!=null)
   {
     var userInput = document.getElementById('userInput');
     var url='controller.php?pattern='+userInput.value;
     request.open('GET',url,true);
     request.onreadystatechange = 
            function() { 
                if((request.readyState==4)){
                    // Asynchronous response has arrived
                    var ajaxResponse=document.getElementById('ajaxResponse');
                    ajaxResponse.innerHTML=request.responseText;
                    ajaxResponse.style.visibility="visible";
                }     
            };
     request.send(null);
   }
}

function selectValue() {

   var list=document.getElementById("list");
   var userInput=document.getElementById("userInput");
   var ajaxResponse=document.getElementById('ajaxResponse');
   userInput.value=list.options[list.selectedIndex].text;
   ajaxResponse.style.visibility="hidden";
   userInput.focus();
}
