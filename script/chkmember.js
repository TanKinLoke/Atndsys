var zixuArray = "";
var page = "search";
var last_focus_id = "";
var last_student_name = "";
var last_student_id = "";
var last_student_card = "";
var last_student_class = "";

function displayData() {
    //Shows search results as table based on search query
    page="show";
    document.getElementById("content-box-a").style.display = "none";
    document.getElementById("content-box-b").style.display = "block";
    getMember();
    $("#back-btn").attr("onclick","backToSearch()");
}

function backToSearch() {
    //Back to search page
    page="search";
    document.getElementById("content-box-a").style.display = "block";
    document.getElementById("content-box-b").style.display = "none";
    $("#back-btn").attr("onclick","location.href='../'");
}

function getQueryType() {
    //Get user selected value on search query type
    return document.getElementById("query-type-selector-input").value;
}

function getMember() {
    //Get data from php and form a table
    zixuArray = "";
    input = document.getElementById("member-selector-input").value.toUpperCase();

    //Get query type
    var queryType = getQueryType();
    queryNo = 0;

    if (queryType == "Member School Number") {
        queryNo = 1;
    } else if (queryType == "Member Name") {
        queryNo = 0;
    } else if (queryType == "Member Class") {
        queryNo = 3;
    }
    
    var code = "";

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            memberArray = this.responseText;
            memberArray = memberArray.split(",");

            for (var i = 0; i<memberArray.length ;i++) {
                if (memberArray[i] == null || memberArray[i] == "") {

                } else {
                    memberArray2 = memberArray[i].split(":");

                    //Check if the member contain filter input
                    if (memberArray2[queryNo].toUpperCase().indexOf(input) > -1) {
                        code = code.concat(
                            "<tr id='"+memberArray2[0].split(" ").join("_").split("\'").join("-")+"'>\n"+
                            "<td><input type='text' id='"+memberArray2[0].split(" ").join("_").split("\'").join("-")+"_text' value='"+memberArray2[0].split("\'").join("&#039;") +"' readonly=\"true\"></td>\n"+
                            "<td><input type='text'  id='"+memberArray2[0].split(" ").join("_").split("\'").join("-")+"_ID_text' value='"+memberArray2[1]+"' readonly=\"true\"></td>\n"+
                            "<td><input type='text'  id='"+memberArray2[0].split(" ").join("_").split("\'").join("-")+"_card_text' value='"+memberArray2[2]+"' readonly=\"true\"></td>\n"+
                            "<td><input type='text' id='"+memberArray2[0].split(" ").join("_").split("\'").join("-")+"_class_text' value='"+memberArray2[3]+"' readonly=\"true\"></td>\n"+
                            "<td><button type='button' id='"+memberArray2[0].split(" ").join("_").split("\'").join("-")+"_edit' class='edit-btn' onclick='editStudent(\""+memberArray2[0].split(" ").join("_").split("\'").join("-")+"\")'></button>\n<button type='button' id='"+memberArray2[0].split(" ").join("_").split("\'").join("-")+"_delete' class='delete-btn' onclick='deleteStudent(\""+memberArray2[0].split(" ").join("_").split("\'").join("-")+"\")'></button></td>\n"+
                            "</tr>\n");

                        zixuArray = zixuArray.concat(memberArray2[0]+","+memberArray2[1]+","+memberArray2[2]+","+memberArray2[3]+":");
                    } else {

                    }

                    

                    // code = code.concat("<option id='"+memberArray2[queryNo]+"'>"+
                    // memberArray2[queryNo]+
                    // "</option>");
            };
            $("#member-table").html("");
            $("#member-table").append(code);
        }
    }
    };

    xmlhttp.open("POST","getMember.php",true);
    xmlhttp.send();

}

function editStudent(name) {
    //Enable user to edit member's name
    if (last_focus_id != "") {
        doneEditStudent(last_focus_id);
    }

    last_focus_id = name;
    last_student_name = document.getElementById(name+"_text").value;
    last_student_id = document.getElementById(name+"_ID_text").value;
    last_student_card = document.getElementById(name+"_card_text").value;
    last_student_class = document.getElementById(name+"_class_text").value;

    $("#"+name+"_text").attr("readonly",false);
    $("#"+name+"_ID_text").attr("readonly",false);
    $("#"+name+"_card_text").attr("readonly",false);
    $("#"+name+"_class_text").attr("readonly",false);
    $("#"+name+"_edit").attr("onclick","doneEditStudent('"+name+"')");
    $("#"+name+"_edit").addClass("toDone");
}

function doneEditStudent(name) {
    //Lock editing feature after pressing done button
    editStudentSend(name);

    last_focus_id = "";
    last_student_name = "";
    last_student_id = "";
    last_student_card = "";
    last_student_class = "";

    $("#"+name+"_text").attr("readonly",true);
    $("#"+name+"_ID_text").attr("readonly",true);
    $("#"+name+"_card_text").attr("readonly",true);
    $("#"+name+"_class_text").attr("readonly",true);
    $("#"+name+"_edit").attr("onclick","editStudent('"+name+"')");
    $("#"+name+"_edit").removeClass("toDone");
}

$(document).keypress(function(e) {
    //Detect Enter keypress
    if (e.which == 13) clickEnter();
})

$(document).keyup(function(e) {
    //Detect ESC keypress
    if (e.which == 27) clickESC();
})

function clickEnter() {
    //Stop editing after pressing Enter button
    if (page == "search") {
        displayData();
    } else if (page == "show") {
        if (last_focus_id != "") {
            doneEditStudent(last_focus_id);
        }
    }
}

function clickESC() {
    //Stop editing after pressing ESC button
    if (page == "show") {
        if (last_focus_id != "") {
            document.getElementById(last_focus_id+"_text").value = last_student_name;
            document.getElementById(last_focus_id+"_ID_text").value = last_student_id;
            document.getElementById(last_focus_id+"_card_text").value = last_student_card;
            document.getElementById(last_focus_id+"_class_text").value = last_student_class;
            doneEditStudent(last_focus_id);
        } else {
            backToSearch();
        }
    }
}

function editStudentSend(name) {
    //Send edited member's name back to database
    send_student_name = document.getElementById(name+"_text").value;
    send_student_id = document.getElementById(name+"_ID_text").value;
    send_student_card = document.getElementById(name+"_card_text").value;
    send_student_class = document.getElementById(name+"_class_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            if (this.responseText == "done") {
                //Success
                
            } else {
                //Fail
                window.alert("Error occured. Please contact system administrator, @Cheah Zixu and @Kin Loke.");
            }
        }
    };

    xmlhttp.open("POST","editMember.php?originalID="+last_student_id+"&newName="+send_student_name+"&newID="+send_student_id+"&newCard="+send_student_card+"&newClass="+send_student_class,true);
    xmlhttp.send();
}

function deleteStudent(name) {
    //Enable user to delete a member's data
    var delID = document.getElementById(name+"_ID_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            if (this.responseText = "done") {
                $("#"+name).remove();
                window.alert("Data deleted");
            } else  {
                //fail
                window.alert("Error occured. Please contact system administrator, @Cheah Zixu and @Kin Loke.");
            } 
        }
    };
    xmlhttp.open("POST","delMember.php?id="+delID,true);
    xmlhttp.send();
}