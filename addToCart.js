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


function addToCart() {
    let quantity = parseInt(document.getElementById("quantity-picker").value);
    let id = parseInt(document.getElementById("id").value);
    let cart = localStorage.getObj("cart");


    if (cart === null) {
        localStorage.setObj("cart", []);
        cart = localStorage.getObj("cart");
    }

    cart[id] = (cart[id] || 0) + quantity;
    localStorage.setObj("cart", cart);

    for (const [key, value] of Object.entries(cart)) {
        getData(key);
        //console.log(key, value);
    }
}
