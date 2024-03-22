const btn = document.querySelector("#btn-show-notification");
const showNotification = document.querySelector("#dropdown-notification");

var span = document.getElementsByClassName("close")[0];

btn.addEventListener("click", (event) => {
    event.stopPropagation();
    showNotification.classList.add("flex");
    showNotification.classList.remove("hidden");
});

span.addEventListener("click", (event) => {
    event.stopPropagation();
    showNotification.classList.add("hidden");
});

document.addEventListener("click", (event) => {
    if (
        !dropdown.contains(event.target) &&
        !dropdownMenu.contains(event.target)
    ) {
        event.stopPropagation();
        dropdownMenu.classList.add("hidden");
    }
});
