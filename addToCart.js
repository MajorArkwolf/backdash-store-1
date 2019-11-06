function addToCart() {
    let quantity = document.getElementById("quantity-picker");
    let id = document.getElementById("id");
    let cartStorage = localStorage.getItem("cart");

    if (cart === null) {
        let cart = [];
        cart.push({id: id, quantity: quantity})
        localStorage.setItem("cart", JSON.stringify(cart));
        alert(cart);
    } else {
        let cart = JSON.parse(localStorage.getItem("cart"));
        cart.push({id: id, quantity: quantity})
        localStorage.setItem("cart", JSON.stringify(cart));
        alert(cart);
    }
}
