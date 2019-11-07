Storage.prototype.setObj = function(key, obj) {
    return this.setItem(key, JSON.stringify(obj))
}
Storage.prototype.getObj = function(key) {
    return JSON.parse(this.getItem(key))
}

function createElementFromHTML(htmlString) {
  let div = document.createElement('div');
  div.innerHTML = htmlString.trim();

  return div.firstChild;
}

function updateQuantity(element) {
    let id = parseInt(element.parentNode.childNodes[0].value)
    let table = document.getElementById("cart")

    for (let i = 0, row; row = table.rows[i]; i++) {
        for (var j = 0, col; col = row.cells[j]; j++) {
            console.log(col.innerHTML)
        }
    }
}

function updateTable(str) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let cart = localStorage.getObj("cart");
            let table = document.getElementById("cart")
            let data = JSON.parse(this.responseText)

            let row = table.insertRow(table.rows.length)
            let cell0 = row.insertCell(0)
            let cell1 = row.insertCell(1)
            let cell2 = row.insertCell(2)
            let cell3 = row.insertCell(3)
            let cell4 = row.insertCell(4)

            let spinner = createElementFromHTML('<input class="quantity-picker-cart" type="number" name="quantity" value="' +
                                                cart[data["id"]] + '" min="1" onclick="updateQuantity(this)">')

            cell0.innerHTML = data["name"]
            cell1.appendChild(spinner)
            cell2.innerHTML = "$" + data["price"]
            cell3.innerHTML = "$" + data["totalPrice"]
            cell4.innerHTML = data["id"]
            cell4.style.display = "none";
        }
    };

    xmlhttp.open("GET","getData.php?" + str,true);
    xmlhttp.send();
}

function populateCart() {
    let cart = localStorage.getObj("cart");

    for (const [key, value] of Object.entries(cart)) {
        if (key != 0 && key != null && value > 0) {
            console.log(key, value)
            updateTable("id=" + key + "&quantity=" + value)
        }
    }
}

populateCart();
