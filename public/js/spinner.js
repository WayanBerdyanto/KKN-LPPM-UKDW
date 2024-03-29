document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        var spinner = document.getElementById('spinner');
        spinner.style.display = 'none';
        var overlay = document.querySelector('.bg-overlay');
        overlay.remove();
    }, 3000); // 3000 milliseconds = 3 seconds
});
