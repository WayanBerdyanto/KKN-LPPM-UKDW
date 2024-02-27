const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");

hamburger.addEventListener("click", () => {
    navMenu.classList.remove("-translate-x-full");
});

document.addEventListener("click", (e) => {
    if (!hamburger.contains(e.target) && !navMenu.contains(e.taget)) {
        navMenu.classList.add("-translate-x-full");
    }
});
