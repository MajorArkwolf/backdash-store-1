"use strict"
function CheckPassword(){
  var x = document.getElementById("userPassword");
  var y = document.getElementById("userPassword2");

  if(x !== undefined || x !== NULL){
    if(y !== undefined || y !== NULL) {
      if(x.value != "" && y.value != "") {
        if (x.value == y.value) {
          document.getElementById('submitbutton').disabled = false;
        } else {
          document.getElementById("verify").innerHTML = "Your passwords do not match!";
        }
      }
    }
  }
}

function CheckInput(){

}
