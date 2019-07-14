function addVenueProcess() {
    $(".overlay").css("display","block");
    setTimeout(() => {
        $(".overlay").addClass("appear");
    }, 150);
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

var actname = "";
var actvenue = "";
var actdate = "";
var actfrom = "";
var actto = "";

function gatherDatas() {
    actname = $("#name-input").val();
    actvenue = $("#actvenue-input").val();
    actdate = $("#date-input").val();
    actfrom = $("#starttime-input").val();
    actto = $("#endtime-input").val();
}

function submitDatas() {
    gatherDatas();
    if (actname !== "") {
        $(".input1 > .input-form").removeClass("error");
        if (actdate !== "") {
            $(".input2 > .input-form").removeClass("error");
            if (actvenue !== "") {
                $(".input3 > .input-form").removeClass("error");
                if (actfrom !== "") {
                    $(".input4 > .input-form").removeClass("error");
                    if (actto !== "") {
                        $(".input5 > .input-form").removeClass("error");
                        //TODO()
                    } else {
                        $(".input5 > .input-form").addClass("error");
                    }
                } else {
                    $(".input4 > .input-form").addClass("error");
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