var inputs;
var selects;

var checkLength = function () {
    for (i = 0; i < inputs.length; i++) {
        if ($(inputs[i]).val().length < 5)
            $(inputs[i]).css({borderColor: "red"});
        else $(inputs[i]).css({borderColor: "white"});
    }
}

var checkConfirmPass = function () {
    if ($("input").is("#confirm-field")) {
        if ($("#password-field").val() != $("#confirm-field").val() || $("#password-field").val() == "")
            $("#password-field,#confirm-field").css({borderColor: "red"});
        else $("#password-field,#confirm-field").css({borderColor: "white"});
    }
}

var checkErrors = function () {
    for (i = 0; i < inputs.length; i++) {
        if ($(inputs[i]).css("borderColor") == "rgb(255, 0, 0)")
            return false;
    }

    for (i = 0; i < selects.length; i++) {
        if ($(selects[i]).css("borderColor") == "rgb(255, 0, 0)")
            return false;
    }

    return true;
}

var checkSelect = function () {
    for (i = 0; i < selects.length; i++) {
        if ($(selects[i]).val() == null) {
            $(selects[i]).css({borderColor: "red"});
        } else {
            $(selects[i]).css({borderColor: "white"});
        }
    }
}

function validate() {
    checkLength();
    checkConfirmPass();
    checkSelect();
    return checkErrors();
}

$(document).ready(function () {
    inputs = $("[type = text],[type = password],[type = date]");
    selects = $("select");
    $("form").submit(validate);
});