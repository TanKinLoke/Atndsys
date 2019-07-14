function addCardProcess() {
    $(".overlay").css("display","block");
    setTimeout(() => {
        $(".overlay").addClass("appear");
    }, 150);
    setTimeout(() => {
        $(".hidden-input").focus();
    }, 300);
}

function closePopup() {
    $(".overlay").removeClass("appear");
    setTimeout(() => {
        $(".overlay").css("display","none");
    }, 250);
}

$(".popup-box").on("click", function(e) {
    e.stopPropagation();
});

var cardID = "";

$(".hidden-input").on("keyup", function() {
    cardID = $(".hidden-input").val();
    if (cardID.length == 10) {
        $("#popup-indicator-img").attr("src","../Assets/imgs/baseline-done-24px.svg");
        $(".popup-indicator").addClass("done");
        setTimeout(() => {
            closePopup();
        }, 1000);
        setTimeout(() => {
            $(".add-card-btn").addClass("done");
            $(".add-card-btn-text").text("Card Added");
        }, 1500);
    }
});

var nameval = "";
var schnoval = "";
var classval = "";

function gatherDatas() {
    nameval = $("#name-input").val();
    schnoval = $("#schno-input").val();
    classval = $("#class-input").val();
}

function submitDatas() {
    gatherDatas();
    if (nameval !== "") {
        $(".input1 > .input-form").removeClass("error");
        if (schnoval !== "" && schnoval.length == 5) {
            $(".input2 > .input-form").removeClass("error");
            if (classval !== "" && classval.length == 4) {
                $(".input3 > .input-form").removeClass("error");
                if (cardID !== "") {
                    $(".add-card-btn").removeClass("error");


                    var xmlhttp = new XMLHttpRequest;
                    xmlhttp.onreadystatechange = function() {
                        if (this.status == 200 & this.readyState == 4) {
                            $(".input-type1").text("");
                            $(".input-type2").text("");
                        }
                    }
                    xmlhttp.open("POST","sql.php?StudentID="+schnoval+"&CardID="+cardID+"&StudentName="+nameval+"&Class="+classval,true);
                    xmlhttp.send();
                } else {
                    $(".add-card-btn").addClass("error");
                }
            } else {
                $(".input3 > .input-form").addClass("error");
            }
        } else {
            $(".input2 > .input-form").addClass("error");
        }
    } else {
        $(".input1 > .input-form").addClass("error");
    }
}