Storage.prototype.setObj = function(key, obj) {
    return this.setItem(key, JSON.stringify(obj))
}
Storage.prototype.getObj = function(key) {
    return JSON.parse(this.getItem(key))
}

function getData(str) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(JSON.parse(this.responseText))
        }
    };

    xmlhttp.open("GET","getData.php?id="+str,true);
    xmlhttp.send();
}

function populateCart() {
    console.log("FOO")
    let cart = document.getElementById("cart");

    for (const [key, value] of Object.entries(cart)) {
        if (key != null) {
             getData(key)
        }
    }
}

populateCart();

//let row = table.insertRow(1);
//let cell1 = row.insertCell(0);
//let cell2 = row.insertCell(1);
//let cell3 = row.insertCell(2);
//let cell4 = row.insertCell(3);
//
//cell1.innerHTML = "Foo";
//cell2.innerHTML = "1";
//cell3.innerHTML = "$10";
//cell4.innerHTML = "$20";
