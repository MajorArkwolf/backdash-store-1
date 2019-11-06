"use strict"
function CheckPassword(){
  var x = document.getElementById("userPassword");
  var y = document.getElementById("userPassword2");

  if(x !== undefined || x !== NULL){
    if(y !== undefined || y !== NULL) {
      if(x.value != "" && y.value != "") {
        if (x.value == y.value) {
          document.getElementById('submitbutton').disabled = false;
          document.getElementById("passwordverify").innerHTML = "";
        } else {
          document.getElementById("passwordverify").innerHTML = "Your passwords do not match!";
          document.getElementById('submitbutton').disabled = true;
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
    document.getElementById("emailverify").innerHTML = "";
  } else {
    document.getElementById("emailverify").innerHTML = "Please enter a valid email!";
  }
  if (name.value != "") {
    count++;
    document.getElementById("nameverify").innerHTML = "";
  } else {
    document.getElementById("nameverify").innerHTML = "Please enter a name!";
  }
  if (password.value != ""){
    count++;
  } else {
    document.getElementById("passwordverify").innerHTML = "Password can not be blank!";
  }
  if(phone.value != "") {
    count++;
    document.getElementById("phoneverify").innerHTML = "";
  } else {
    document.getElementById("phoneverify").innerHTML = "Please enter a phone number!";
  }
  if(address.value != "") {
    count++;
    document.getElementById("addressverify").innerHTML = "";
  } else {
    document.getElementById("addressverify").innerHTML = "Please enter an address in!";
  }

  if (count == 5) {
    return true;
  } else {
    return false;
  }
}
