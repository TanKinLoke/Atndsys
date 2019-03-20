var confirmState = false;
var selectedActivity;
var showSuccess = document.getElementById("content-box-b-c4");
var CardID;

function confirmActivity() {
    // Hide select activity box and start detecting card
    document.getElementById("content-box-a").style.display = "none";
    document.getElementById("content-box-b").style.display = "block";
    document.getElementById("CardID").focus();
    confirmState = true;
    // Get card data and save as variable
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
            CardID = document.getElementById("CardID").value;

            var xmlhttp = new XMLHttpRequest;
            xmlhttp.onreadystatechange = function() {
                if(this.responseText == "done") {
                    showSuccessFun(CardID);
                } else if (this.responseText == "fail") {

                } else if (this.responseText == "CardEmpty") {

                }
            };
            // Post datas to SQL via PHP
            xmlhttp.open("POST","sql.php?CardID="+CardID+"&ActivitySelection="+selectedActivity,true);
            xmlhttp.send();
        }
    }
});

function showSuccessFun(id) {
    if (id !== "") {
        showSuccess.innerHTML = "Attendance marked for " + id;
        document.getElementById("CardID").value = "";
    }
}