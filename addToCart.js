Storage.prototype.setObj = function(key, obj) {
    return this.setItem(key, JSON.stringify(obj))
}
Storage.prototype.getObj = function(key) {
    return JSON.parse(this.getItem(key))
}

localStorage.setObj("cart", []);

function addToCart() {
    let quantity = parseInt(document.getElementById("quantity-picker"));
    let id = parseInt(document.getElementById("id"));
    let cart = localStorage.getObj("cart");

    console.log(id);
    console.log(cart);

    if (cart === null) {
        localStorage.setObj("cart", []);
        cart = localStorage.getObj("cart");
    }

    cart[id] = (cart[id] || 0) + quantity;
    localStorage.setObj("cart", cart);
}
