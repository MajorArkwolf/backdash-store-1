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
  var name = document.getElementById("name");
  var password = document.getElementById("userPassword");
  var phone = document.getElementById("phonenumber");
  var address = document.getElementById("address");

  //The verficiation text boxes.
  var v_email = document.getElementById("emailverify");
  var v_name = document.getElementById("nameverify");
  var v_password = document.getElementById("passwordverify");
  var v_phone = document.getElementById("phoneverify");
  var v_address = document.getElementById("addressverify");

  if(validateEmail(email.value)) {
    count++;
    v_email.textContent = "";
  } else {
    v_email.textContent = "Please enter a valid email!";
  }
  if (name.value != "") {
    count++;
    v_name.textContent = "";
  } else {
    v_name.textContent = "Please enter a name!";
  }
  if (password.value != ""){
    count++;
  } else {
    v_password.textContent = "Password can not be blank!";
  }
  if(phone.value != "") {
    count++;
    v_phone.textContent = "";
  } else {
    v_phone.textContent = "Please enter a phone number!";
  }
  if(address.value != "") {
    count++;
    v_address.textContent = "";
  } else {
    v_address.textContent = "Please enter an address in!";
  }

  if (count == 5) {
    return true;
  } else {
    return false;
  }
}
