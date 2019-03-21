var backBtn = document.getElementById("back-btn");
backBtn.addEventListener("click", fade);
function fade(e) {
    var index = 0;
    var el = e.target;
    el.style.opacity = 0;
    backBtn.style.left = "-50px";
    el.style.transition = ".5s";
    setInterval(function() {
        location.href = "../";
    }, 500);
}