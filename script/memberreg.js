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
    if (input0.value !== "") {
        if (input1.value !== "") {
            if (input2.value !== "") {
                center0.style.display = "none";
                center1.style.display = "block";
                document.getElementById("CardID").focus();
                output0.innerText = input0.value;
                input_name = input0.value;
                output1.innerText = input1.value;
                input_id = input1.value;
                output2.innerText = input2.value;
                input_class = input2.value;
                pageCheck = 1;
            }
        }
    }
}

function inputCardDetails(cardvalue) {
    output3.innerText = cardvalue;
    status0.innerText = "CARD DETECTED";
    setTimeout(function() {
        endProcess();
    },3000);
}

function endProcess() {
    center0.style.display = "none";
    center1.style.display = "none";
    center3.style.display = "block";
    console.log(document.getElementById("StudentName").value);
    console.log(document.getElementById("StudentID").value);
    console.log(document.getElementById("Class").value);
    console.log(document.getElementById("CardID").value);
    document.getElementById("StudentName2").value = input_name;
    document.getElementById("StudentID2").value = input_id;
    document.getElementById("Class2").value = input_class;
    document.getElementById("CardID2").value = document.getElementById("CardID").value;
}

function backtoInit() {
    center0.style.display = "block";
    center1.style.display = "none";
    center2.style.display = "none";
    input0.value = "";
    input1.value = "";
    input2.value = "";
}

document.addEventListener('keydown', function (e) {
    var key = e.which || e.keyCode;
    if (key === 13) { 
        if (pageCheck == 1) {
            pageCheck = 2;
        }
        if (pageCheck == 2) {
            endProcess();
        }
    }
});