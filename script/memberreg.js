var center0 = document.getElementById("center0");
var center1 = document.getElementById("center1");
var center2 = document.getElementById("center2");
var center3 = document.getElementById("center3");
var input0 = document.getElementById("StudentName");
var input1 = document.getElementById("StudentID");
var input2 = document.getElementById("Class");
var input3 = document.getElementById("CardID");
var input_name;
var input_id;
var input_class;
var input_cardid;
var output0 = document.getElementById("c4a");
var output1 = document.getElementById("c4b");
var output2 = document.getElementById("c4c");
var output3 = document.getElementById("c5b");
var status0 = document.getElementById("c5c");
var pageCheck = 0;

function submitDetails() {
    /*
        Function = submitDetails()
        Data validation and stores user data temporarily
    */
    if (input0.value !== "") {
        if (input1.value !== "") {
            if (input2.value !== "") {
                center0.style.display = "none";
                center1.style.display = "block";
                output0.innerText = input0.value;
                input_name = input0.value;
                output1.innerText = input1.value;
                input_id = input1.value;
                output2.innerText = input2.value;
                input_class = input2.value;
                pageCheck = 1;
                if (document.getElementById("CardID").focus() != true) {
                    document.getElementById("CardID").focus();
                }
            }
        }
    }
}

function inputCardDetails(cardvalue) {
    /*
        Function = inputCardDetails(cardvalue)
        Detects card and its data
    */
    output3.innerText = cardvalue;
    status0.innerText = "CARD DETECTED";
    setTimeout(function() {
        endProcess();
    },3000);
}

function endProcess() {
    /*
        Function = endProcess()
        Combines all received data and send to backend
    */
    center1.style.display = "none";
    var CardValue = document.getElementById("CardID").value;
    
    var success = "New member data has been added to the database successfully.";
    var fail = "Error occured. Please contact system administrator, @Cheah Zixu and @Kin Loke.";
    var empty = "Some info is being left empty. Please fill it and submit again. If you think is this a bug, please contact system administrator, @Cheah Zixu and @Kin Loke.";
    
    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if(this.responseText == "done" && success != "") {
            //Success
            window.alert(success);
            success = "";
            center0.style.display = "block";
            center1.style.display = "none";
            input0.value = "";
            input1.value = "";
            input2.value = "";
        } else if(this.responseText == "fail" && fail != "") {
            //Fail
            window.alert(fail);
            fail = "";
            center0.style.display = "block";
            center1.style.display = "none";
        } else if(this.responseText == "empty" && empty != "") {
            //Some info is being left empty
            window.alert(empty);
            empty = "";
            center0.style.display = "block";
            center1.style.display = "none";
        }
        input3.value = "";
    };

    input3.value = "";
    xmlhttp.open("POST","sql.php?StudentID="+input_id+"&CardID="+CardValue+"&StudentName="+input_name+"&Class="+input_class,true);
    xmlhttp.send();
}

document.addEventListener('keydown', function (e) {
    /*
        EventListener = keydown
        Detects keypress(key shortcuts) for faster user experience
    */
    var key = e.which || e.keyCode;
    if (key === 13) { 
        if (pageCheck == 1) {
            pageCheck = 2;
        }
        if (pageCheck == 2) {
            endProcess();
            pageCheck++;
        }
    }
});