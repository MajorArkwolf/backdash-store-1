"use strict"
function CheckProduct(){
  var count = 0;
  var name = document.getElementById("name")
  var description = document.getElementById("description");
  var price = document.getElementById("price");
  var stock = document.getElementById("stock");

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