$(document).ready(function () {
    $("#profile #send-message").bind("click",showMessageBox);
    $("#profile #message #send").bind("click",sendMessage);
    $("#sympathy").bind("click",sendSympathy);
});

function showMessageBox() {
    var box = $("#profile #message");
    if ($(box).css("display") == "none")
        $(box).show(200);
    else $(box).hide(200);
}

var login = location.search;
login = login.substring(7);

function sendMessage() {
    if ($("#message-text").val().length == 0)
        return;
    var login = location.search;
    login = login.substring(7);
    var messageText = $("#message-text").val();
    $.ajax({
        type: "POST",
        url: "../ajax/GetDialogIDorCreate.php",
        data: "login=" + login,
        datatype: "text",
        success: function (dialog_id) {
            $.ajax({
                type: "POST",
                url: "../ajax/SendMessage.php",
                data: {dialog_id: dialog_id,message: messageText},
                success: function () {
                    showMessageBox();
                    $("#message-text").val("");
                }
            });
        }
    });
}

function sendSympathy() {
    $.ajax({
        type: "POST",
        data: "login=" + login,
        url: "../ajax/SendSympathy.php",
        success: function () {
            console.log($("#options #sympathy img"));
            $("#options #sympathy img").attr("src","image/like.png");
        }
    });
}