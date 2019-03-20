var confirmState = false;
var selectedActivity;

function confirmActivity() {
    document.getElementById("content-box-a").style.display = "none";
    document.getElementById("content-box-b").style.display = "block";
    document.getElementById("CardID").focus();
    confirmState = true;
    selectedActivity = document.getElementById("activity-name-selector-input").value;
}

document.addEventListener('keydown', function (e) {
    /*
        EventListener = keydown
        Detects keypress(key shortcuts) for faster user experience
    */
    var key = e.which || e.keyCode;
    if (key === 13) { 
        if (confirmState == true) {
            document.getElementById("CardID").submit();
            // Get Card ID by calling document.getElementById("CardID").value
        }
    }
});