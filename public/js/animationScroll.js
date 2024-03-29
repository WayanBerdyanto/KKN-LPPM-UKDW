document.addEventListener("DOMContentLoaded", function () {
    var animatedSectionLayanan = document.querySelector("#layanan");

    function fadeInOnScroll() {
        var scrollPosition = window.scrollY;
        var sectionPosition = animatedSectionLayanan.offsetTop;

        if (scrollPosition >= sectionPosition - window.innerHeight / 2) {
            animatedSectionLayanan.style.opacity = 1;
            animatedSectionLayanan.style.transform = "translateX(0)";
        }
    }
    window.addEventListener("scroll", fadeInOnScroll);
    fadeInOnScroll();
});
