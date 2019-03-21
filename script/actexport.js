var atndlistStatus = false;

function seeAttendance() {
    if (!atndlistStatus) {
        var displayTitle = document.getElementById("activity-selector-input").value;
        document.getElementById("content-box-b").style.display = "block";
        document.getElementById("content-title").innerText = displayTitle;
        atndlistStatus = true;
    } else {
        document.getElementById("content-box-b").style.display = "none";
        atndlistStatus = false;
    }
}