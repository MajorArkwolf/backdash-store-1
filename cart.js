Storage.prototype.setObj = function(key, obj) {
    return this.setItem(key, JSON.stringify(obj))
}
Storage.prototype.getObj = function(key) {
    return JSON.parse(this.getItem(key))
}

function buy() {
    let cart = localStorage.getObj("cart")
    let outCart = []

    for (const [key, value] of Object.entries(cart)) {
        if (key != 0 && key != null && value > 0) {
            outCart.push({id: key, quantity: value})
        }
    }

    window.location.href = "buy.php?data=" + JSON.stringify(outCart);
}

function sortTable(table, col, reverse) {
    let tb = table.tBodies[0],
        tr = Array.prototype.slice.call(tb.rows, 0),
        i;
    reverse = -((+reverse) || -1);
    tr = tr.sort(function (a, b) {
        return reverse // `-1 *` if want opposite order
        * (a.cells[col].textContent.trim()
           .localeCompare(b.cells[col].textContent.trim())
        );
    });

    for(i = 0; i < tr.length; ++i) {
        tb.appendChild(tr[i])
    }
}

function removeItem(element) {
    let table = document.getElementById("cart")
    let row = element.parentNode.parentNode
    let id = parseInt(row.childNodes[4].innerHTML)

    let cart = localStorage.getObj("cart")

    if (cart === null) {
        localStorage.setObj("cart", [])
        cart = localStorage.getObj("cart")
    }

    delete cart[id]
    localStorage.setObj("cart", cart)
    row.parentNode.removeChild(row)
    updateTotal()
}

function createElementFromHTML(htmlString) {
    let div = document.createElement('div')
    div.innerHTML = htmlString.trim()

    return div.firstChild
}

function updateQuantity(element) {
    let table = document.getElementById("cart")
    let row = element.parentNode.parentNode
    let quantity = parseInt(element.value)
    let id = parseInt(row.childNodes[4].innerHTML)

    let cart = localStorage.getObj("cart")

    if (cart === null) {
        localStorage.setObj("cart", [])
        cart = localStorage.getObj("cart")
    }

    cart[id] = quantity
    localStorage.setObj("cart", cart);

    xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText)

            element.parentNode.parentNode.childNodes[3].innerHTML = "$" + data["totalPrice"]
        }

        updateTotal()
    }

    xmlhttp.open("GET","getData.php?id=" + id + "&quantity=" + quantity,true)
    xmlhttp.send()
}

function updateTotal() {
    let table = document.getElementById("cart")
    let body = table.tBodies[0]
    let total = 0.0

    for (let i = 0; i < body.rows.length; ++i) {
        let price = body.rows[i].cells[3]
        let text = price.textContent.substr(1)
        total += parseFloat(text)
    }

    document.getElementById("grand-total").innerHTML = "$" + total.toFixed(2);
}

function updateTable(str) {
    xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let cart = localStorage.getObj("cart")
            let table = document.getElementById("cart").getElementsByTagName("tbody")[0]
            let data = JSON.parse(this.responseText)

            let row = table.insertRow()
            let cell0 = row.insertCell(0)
            let cell1 = row.insertCell(1)
            let cell2 = row.insertCell(2)
            let cell3 = row.insertCell(3)
            let cell4 = row.insertCell(4)

            let spinner = createElementFromHTML('<input class="quantity-picker-cart" type="number" name="quantity" value="' +
                                                cart[data["id"]] + '" min="1" onclick="updateQuantity(this)">')
            let remove = createElementFromHTML(
                  '<button type="submit" class="remove-button" name="submit" onclick="removeItem(this)">' +
                    '<i class="fa fa-times"></i>' +
                  '</button>')
            cell0.innerHTML = data["name"]
            cell1.appendChild(spinner)
            cell1.appendChild(remove)
            cell2.innerHTML = "$" + data["price"]
            cell3.innerHTML = "$" + data["totalPrice"]
            cell4.innerHTML = data["id"]
            cell4.style.display = "none"

            sortTable(document.getElementById("cart"), 4, false)
            updateTotal()
        }
    }

    xmlhttp.open("GET","getData.php?" + str,true)
    xmlhttp.send()
}

function populateCart() {
    let cart = localStorage.getObj("cart")

    for (const [key, value] of Object.entries(cart)) {
        if (key != 0 && key != null && value > 0) {
            updateTable("id=" + key + "&quantity=" + value)
        }
    }
}

populateCart()
