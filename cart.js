Storage.prototype.setObj = function(key, obj) {
    return this.setItem(key, JSON.stringify(obj))
}
Storage.prototype.getObj = function(key) {
    return JSON.parse(this.getItem(key))
}

function sortTable(table, col, reverse) {
    let tb = table.tBodies[0], // use `<tbody>` to ignore `<thead>` and `<tfoot>` rows
        tr = Array.prototype.slice.call(tb.rows, 0), // put rows into array
        i;
    reverse = -((+reverse) || -1);
    tr = tr.sort(function (a, b) { // sort rows
        return reverse // `-1 *` if want opposite order
        * (a.cells[col].textContent.trim() // using `.textContent.trim()` for test
           .localeCompare(b.cells[col].textContent.trim())
        );
    });
    for(i = 0; i < tr.length; ++i) tb.appendChild(tr[i]); // append each row in order
}


function createElementFromHTML(htmlString) {
    let div = document.createElement('div');
    div.innerHTML = htmlString.trim();

    return div.firstChild;
}

function updateQuantity(element) {
    let table = document.getElementById("cart")
    let quantity = parseInt(element.parentNode.childNodes[0].value)
    let id = parseInt(element.parentNode.parentNode.childNodes[4].innerHTML)

    console.log(quantity, id)

    let cart = localStorage.getObj("cart");

    if (cart === null) {
        localStorage.setObj("cart", []);
        cart = localStorage.getObj("cart");
    }

    cart[id] = quantity;
    localStorage.setObj("cart", cart);

    let table = document.getElementById("cart").getElementsByTagName("tbody")[0]
    for (let i = 0; i < table.rows.length; ++i) {
        table.deleteRow(i)
    }

    populateCart()
}

function updateTable(str) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let cart = localStorage.getObj("cart");
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

            cell0.innerHTML = data["name"]
            cell1.appendChild(spinner)
            cell2.innerHTML = "$" + data["price"]
            cell3.innerHTML = "$" + data["totalPrice"]
            cell4.innerHTML = data["id"]
            cell4.style.display = "none";

            sortTable(document.getElementById("cart"), 4, false);
        }
    };

    xmlhttp.open("GET","getData.php?" + str,true);
    xmlhttp.send();
}

function populateCart() {
    let cart = localStorage.getObj("cart");

    for (const [key, value] of Object.entries(cart)) {
        if (key != 0 && key != null && value > 0) {
            updateTable("id=" + key + "&quantity=" + value)
        }
    }
}

populateCart()
