Storage.prototype.setObj = function(key, obj) {
    return this.setItem(key, JSON.stringify(obj))
}
Storage.prototype.getObj = function(key) {
    return JSON.parse(this.getItem(key))
}

function updateTable(str) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let table = document.getElementById("cart")
            let data = JSON.parse(this.responseText)

            let row = table.insertRow(table.rows.length)
            let cell1 = row.insertCell(0)
            let cell2 = row.insertCell(1)
            let cell3 = row.insertCell(2)
            let cell4 = row.insertCell(3)

            cell1.innerHTML = data["name"]
            cell2.innerHTML = "1234"
            cell3.innerHTML = data["price"]
            cell4.innerHTML = "foobar"
        }
    };

    xmlhttp.open("GET","getData.php?id="+str,true);
    xmlhttp.send();
}

function populateCart() {
    let cart = localStorage.getObj("cart");

    for (const [key, value] of Object.entries(cart)) {
        if (key != 0 && key != null) {
            console.log(key, value)
            updateTable(key)
        }
    }
}

populateCart();
