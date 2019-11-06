localStorage.setItem("cart", JSON.stringify([]));

function addToCart() {
    let quantity = document.getElementById("quantity-picker");
    let id = document.getElementById("id");
    let cart;

    if (localStorage.getItem("cart") === null) {
        cart = [];
    } else {
        cart = JSON.parse(localStorage.getItem("cart"));
    }

    cart[id.value] = cart[id.value] + quantity.value;
    localStorage.setItem("cart", JSON.stringify(cart));
    console.log(cart);
}
