"use strict"
function CheckProduct(){
  var count = 0;
  var name = document.getElementById("pname");
  var description = document.getElementById("pdescription");
  var price = document.getElementById("pprice");
  var stock = document.getElementById("pstock");
  if(name == null || description == null || price == null || stock == null){
    return false;
  }
  if (name.value != "") {
    count++;
  }
  if (description.value != ""){
    count++;
  }
  if(price.value != "") {
    count++;
  }
  if(stock.value != "") {
    count++;
  }

  if (count == 4) {
    return true;
  } else {
    return false;
  }
}

function CheckCategory(){
  var count = 0;
  var name = document.getElementById("cname");
  var description = document.getElementById("cdescription");
  if(name == null || description == null){
    return false;
  }
  if (name.value != "") {
    count++;
  }
  if (description.value != ""){
    count++;
  }

  if (count == 2) {
    return true;
  } else {
    return false;
  }
}
