Storage.prototype.setObj = function(key, obj) {
    return this.setItem(key, JSON.stringify(obj))
}
Storage.prototype.getObj = function(key) {
    return JSON.parse(this.getItem(key))
}


function addToCart() {
    let quantity = parseInt(document.getElementById("quantity-picker").value);
    let id = parseInt(document.getElementById("productId").value);
    let cart = localStorage.getObj("cart");

    if (cart === null) {
        localStorage.setObj("cart", []);
        cart = localStorage.getObj("cart");
    }

    cart[id] = (cart[id] || 0) + quantity;
    localStorage.setObj("cart", cart);

    for (const [key, value] of Object.entries(cart)) {
        console.log(key, value);
    }
}
