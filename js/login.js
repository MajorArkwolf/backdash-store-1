"use strict"
function CheckInfo(){
  var x = document.getElementById("email");
  var y = document.getElementById("userPassword");

  if(x !== undefined || x !== NULL){
    if(y !== undefined || y !== NULL) {
      if(x.value != "" && y.value != "") {
        document.getElementById('submitbutton').disabled = false;
      }
    }
  }
}

function CheckInput(){

}
