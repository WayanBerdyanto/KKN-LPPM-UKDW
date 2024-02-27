const dropdown = document.querySelector("#dropdown");
const dropdownMenu = document.querySelector("#dropdown-menu");

dropdown.addEventListener("click", (event) => {
    event.stopPropagation();
    dropdownMenu.classList.toggle("hidden");
});

