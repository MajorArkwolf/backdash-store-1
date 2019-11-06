"use strict"
function CheckPassword(){
  var x = document.getElementById("userPassword");
  var y = document.getElementById("userPassword2");

  if(x !== undefined || x !== NULL){
    if(y !== undefined || y !== NULL) {
      if(x.value != "" && y.value != "") {
        if (x.value == y.value) {
          document.getElementById('submitbutton').disabled = false;
          document.getElementById("verify").innerHTML = "";
        } else {
          document.getElementById("verify").innerHTML = "Your passwords do not match!";
        }
      }
    }
  }
}

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function CheckInput(){
  var count = 0;
  var email = document.getElementById("email");
  var name = document.getElementById("name")
  var password = document.getElementById("userPassword");
  var phone = document.getElementById("phonenumber");
  var address = document.getElementById("address");
  if(validateEmail(email.value)) {
    count++;
  }
  if (name.value != "") {
    count++;
  }
  if (password.value != ""){
    count++;
  }
  if(phone.value != "") {
    count++;
  }
  if(address.value != "") {
    count++;
  }

  if (count == 5) {
    window.location.href = "sendRegistration.php";
    return true;
  } else {
    return false;
  }
}
