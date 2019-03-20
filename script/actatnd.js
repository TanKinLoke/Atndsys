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
            // Get Card ID by calling document.getElementById("CardID").value
            var CardID = document.getElementById("CardID").value;

            var xmlhttp = new XMLHttpRequest;
            xmlhttp.onreadystatechange = function() {
                if(this.responseText == "done") {
                    console.log("Success");
                } else if (this.responseText == "fail") {

                } else if (this.responseText == "CardEmpty") {

                }
            };
            xmlhttp.open("POST","sql.php?CardID="+CardID+"&ActivitySelection="+selectedActivity,true);
            xmlhttp.send();
        }
    }
});