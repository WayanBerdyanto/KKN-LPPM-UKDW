const dropdown = document.querySelector("#dropdown");
const dropdownMenu = document.querySelector("#dropdown-menu");

dropdown.addEventListener("click", (event) => {
    event.stopPropagation();
    dropdownMenu.classList.toggle("hidden");
});

document.addEventListener("click", (event) => {
    if (
        !dropdown.contains(event.target) &&
        !dropdownMenu.contains(event.target)
    ) {
        dropdownMenu.classList.add("hidden");
    }
});
