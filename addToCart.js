Storage.prototype.setObj = function(key, obj) {
    return this.setItem(key, JSON.stringify(obj))
}
Storage.prototype.getObj = function(key) {
    return JSON.parse(this.getItem(key))
}

localStorage.setItem("cart", JSON.stringify([]));

function addToCart() {
    let quantity = parseInt(document.getElementById("quantity-picker"));
    let id = parseInt(document.getElementById("id"));
    let cart = localStorage.getObj("cart");

    console.log(id.value);
    console.log(cart);

    if (cart === null) {
        localStorage.setObj("cart", []);
        cart = localStorage.getObj("cart");
    }

    cart[id] = (cart[id] || 0) + quantity;
    localStorage.setObj("cart", cart);
}
