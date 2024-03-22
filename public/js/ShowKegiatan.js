const btnKegiatan = document.querySelector("#btn-show-kegiatan");
const showKegiatan = document.querySelector("#dropdown-kegiatan");

var spanKegiatan = document.getElementsByClassName("closeKegiatan")[0];

btnKegiatan.addEventListener("click", (event) => {
    event.stopPropagation();
    showKegiatan.classList.add("flex");
    showKegiatan.classList.remove("hidden");
});

spanKegiatan.addEventListener("click", (event) => {
    event.stopPropagation();
    showKegiatan.classList.add("hidden");
});

document.addEventListener("click", (event) => {
    if (
        !btnKegiatan.contains(event.target) &&
        !showKegiatan.contains(event.target)
    ) {
        event.stopPropagation();
        showKegiatan.classList.add("hidden");
    }
});
