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

    table.rows.forEach((i) => {
        console.log(i.cells[0].innerHTML)
    })
}

function updateTable(str) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let cart = localStorage.getObj("cart");
            let table = document.getElementById("cart")
            let data = JSON.parse(this.responseText)

            let row = table.insertRow(table.rows.length)
            let cell1 = row.insertCell(0)
            let cell2 = row.insertCell(1)
            let cell3 = row.insertCell(2)
            let cell4 = row.insertCell(3)

            cell1.innerHTML = data["name"]
            cell3.innerHTML = "$" + data["price"]
            cell4.innerHTML = "$" + data["totalPrice"]

            let hiddenId = createElementFromHTML('<input type="hidden" name="id" value="' + data["id"] + '">')
            let spinner = createElementFromHTML('<input class="quantity-picker-cart" type="number" name="quantity" value="' +
                                                cart[data["id"]] + '" min="1" onclick="updateQuantity(this)">')
            cell2.appendChild(hiddenId)
            cell2.appendChild(spinner)
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
