function toggleNavbar() {
    let navBar = document.getElementsByClassName("navbar")[0];
    if (navBar.className === "navbar") {
        navBar.className += " responsive";
    } else {
        navBar.className = "navbar";
    }
}
