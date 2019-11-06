localStorage.setItem("cart", JSON.stringify([]));

function addToCart() {
    let quantity = document.getElementById("quantity-picker");
    let id = document.getElementById("id");
    let cart;

    if (localStorage.getItem("cart") === null) {
        cart = [];
        cart.push({id: id, quantity: quantity})
    } else {
        cart = JSON.parse(localStorage.getItem("cart"));
        cart.push({id: id, quantity: quantity})
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    console.log(cart);
}
