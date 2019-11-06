Storage.prototype.setObj = function(key, obj) {
    return this.setItem(key, JSON.stringify(obj))
}
Storage.prototype.getObj = function(key) {
    return JSON.parse(this.getItem(key))
}

localStorage.setObj("cart", []);

function addToCart() {
    let quantity = parseInt(document.getElementById("quantity-picker").value);
    let id = parseInt(document.getElementById("id").value);
    let cart = localStorage.getObj("cart");

    console.log(id);
    console.log(cart);

    if (cart === null) {
        localStorage.setObj("cart", []);
        cart = localStorage.getObj("cart");
    }

    cart[toString(id)] = (cart[toString(id)] || 0) + quantity;
    localStorage.setObj("cart", cart);
}
