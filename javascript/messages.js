var login;
var dialogID;
$(document).ready(function () {
    login = getLogin();
    drawDialogs();
    $("#delete-dialog").bind("click",deleteListener);
    $("#clear-dialog").bind("click",clearDialog);
    var dialogs = $("#messages #dialogs #body");
    dialogs.scrollTop(dialogs.prop('scrollHeight'));
    scrollBottomMessages();
    $("#new-dialog").bind("click",addShow);
    $("#added").bind("click",addDialog);
    $("#send").bind("click",sendMessage);
    setInterval(refreshMessages,2000);
    setInterval(refreshDialogs,4000);
    $(window).keydown(keydown);
});


var KeyCodes = {
    enter: 13
};

function keydown(key) {
    if (key.altKey && key.keyCode == KeyCodes.enter)
        sendMessage();
}

function deleteMessage() {
    var messages = getMessages($(".selected-dialog").index())
    var selectedMessage = messages[$(".select-message").index()];
    $.ajax({
        type: "POST",
        url: "../ajax/DeleteMessageByID.php",
        data: "id=" + selectedMessage.ID,
        datatype: "text",
        success: function (result) {
            if (result)
                drawMessages();
        }
    })
}

function messageAnimate() {
    $(".message").mouseenter(function () {
        $(this).children("#name").children(".delete-message").css("display","block");
        $(this).children("#date").css("display","block");
    });
    $(".message").mouseleave(function () {
        $(this).children("#name").children(".delete-message").css("display","none");
        $(this).children("#date").css("display","none");
    });
    $(".delete-message").mouseenter(function () {
        var message = $(this).parent().parent();
        $(message).addClass("select-message");
    });
    $(".delete-message").mouseleave(function () {
        $(".select-message").removeClass("select-message");
    });
}

function clearDialog() {
    $.ajax({
        type: "POST",
        url: "../ajax/ClearDialog.php",
        dataType: "text",
        data: "id=" + dialogID,
        success: function (result) {
            if (result)
                drawMessages();
        }
    });
    showOptions();
}

function deleteListener() {
    $.ajax({
        type: "POST",
        url: "../ajax/DeleteListenerByID.php",
        dataType: "text",
        data: "id=" + dialogID,
        success: function (result) {
            if (result) {
                drawDialogs();
                $("#options").hide(200);
            }
        }
    });
    showOptions();
}

function showOptions() {
    var options = $("#options");
    if ($(options).css("display") == "none") {
        $(options).css({top: this.offsetTop});
        $(options).show(200);
    } else $(options).hide(200);
}

function scrollBottomMessages() {
    var messages = $("#messages #dialog-messages #body");
    messages.scrollTop(messages.prop('scrollHeight') + 500);
}

function getLogin() {
    var login;
    $.ajax({
        type: "POST",
        url: "../ajax/GetLogin.php",
        async: false,
        dataType: "text",
        complete: function (result) {
            login = result.responseText;
        }
    });
    return login;
}

function selectDialog() {
    $(".selected-dialog").removeClass("selected-dialog");
    $(this).addClass("selected-dialog");
    drawMessages();
}

function drawMessages() {
    var messages = getMessages($(".selected-dialog").index());
    console.log(messages);
    var container = $("#messages #dialog-messages #body");
    $(container).empty();
    if (messages) {
        for (i = 0; i < messages.length; i++) {
            var message = document.createElement("div");
            $(message).addClass("message");
            
            var avatar = document.createElement("img");
            avatar.login = messages[i].login;
            $(avatar).bind("click",openProfile);
            $(avatar).attr("src",getAvatarPath(messages[i].login));
            $(message).append(avatar);
            
            var name = document.createElement("div");
            name.login = messages[i].login;
            $(name).attr("id","name");
            $(name).text(getName(messages[i].login));
            $(message).append(name);

            function openProfile() {
                document.location.href = "http://good-face/profile.php?login=" + this.login;
            }
            
            var delete_message = document.createElement("span");
            $(delete_message).addClass("delete-message");
            $(delete_message).attr("title","Удалить сообщение");
            $(name).append(delete_message);
            $(message).append(name);
            
            var date = document.createElement("div");
            $(date).attr("id","date");
            $(date).text(messages[i].send_date);
            $(message).append(date);
            
            var messageText = document.createElement("div");
            $(messageText).attr("id","message-text");
            $(messageText).text(messages[i].message);
            $(message).append(messageText);
            container.append(message);
        }
        scrollBottomMessages();
        messageAnimate();
        $(".delete-message").bind("click",deleteMessage);
    }
}

function getMessages(dialogNumber) {
    var dialogs = getDialogs();
    if (dialogs.length == 0)
        return;
    var id = dialogs[dialogNumber].dialog_id;
    dialogID = id;
    var messages;
    $.ajax({
        type: "POST",
        data: "id=" + id,
        url: "../ajax/GetMessagesByDialog.php",
        async: false,
        dataType: "json",
        complete: function (result) {
            messages = result.responseJSON;
        }
    });
    return messages;
}

function sendMessage() {
    var message = $("#message-editable").val().trim();

    if (message.length > 0){
        $.ajax({
            type: "POST",
            data: {dialog_id: dialogID,message: message},
            url: "../ajax/SendMessage.php",
            dataType: "text",
            success: function (result) {
                drawMessages();
                $("#message-editable").val("");
            }
        });
    }
}

function refreshMessages() {
    $.ajax({
        type: "POST",
        data: "dialog_id=" + dialogID,
        url: "../ajax/GetCountMessagesByDialog.php",
        dataType: "text",
        success: function (count) {
            var currentMsgCount = $(".message").length;
            if (currentMsgCount != count)
                drawMessages();
        }
    })
}

function refreshDialogs() {
    $.ajax({
        type: "POST",
        url: "../ajax/GetCountListeners.php",
        dataType: "text",
        success: function (result) {
            var currentDialogsCount = $(".dialog").length;
            if (currentDialogsCount != result)
                drawDialogs();
        }
    });
}

function addShow() {
    $("#added-login").val("");
    var addBox = $("#add-box");
    if ($(addBox).css("display") == "none") {
        $(addBox).show(200);
        $(addBox).bind("keydown",function (key) {
            if (key.keyCode == 13)
                addDialog();
        });
    } else {
        $(addBox).hide(200);
        $(addBox).unbind("keydown");
    }
}

function addDialog() {
    var login = $("#added-login");
    if (!validation()) {
        $(login).css({borderColor: "red"});
        return false;
    }

    $(login).css({borderColor: "white"});
    $.ajax({
        type: "POST",
        data: "login=" + $(login).val(),
        url: "../ajax/CreateDialog.php",
        dataType: "text",
        success: function (result) {
            if (result == "True") {
                addShow();
                drawDialogs();
            }
            else {
                $("#error").detach();
                var error = document.createElement("p");
                $(error).attr("id","error");
                $(error).text(result);
                $("#add-box").append(error);
            }
        }
    });
}

function getAvatarPath(login) {
    var path;
    $.ajax({
        type: "POST",
        data: "login=" + login,
        async: false,
        url: "../ajax/GetAvatarPathByLogin.php",
        dataType: "text",
        complete: function (avatar_path) {
            path = avatar_path.responseText;
        }
    });
    return path;
}

function getName(login) {
    var name;
    $.ajax({
        type: "POST",
        data: "login=" + login,
        async: false,
        url: "../ajax/GetNameByLogin.php",
        dataType: "text",
        complete: function (avatar_path) {
            name = avatar_path.responseText;
        }
    });
    return name;
}

function drawDialogs() {
    var dialogs = getDialogs();
    if (!dialogs)
        return;
    if (!dialogs)
        return;
    var container = $("#messages #dialogs #body");
    $(container).empty();
    for (i = 0; i < dialogs.length; i++) {
        var dialog = document.createElement("div");
        $(dialog).addClass("dialog");
        if (i == 0)
            $(dialog).addClass("selected-dialog");

        var avatar = document.createElement("img");
        $(avatar).attr("src",getAvatarPath(dialogs[i].login));
        $(avatar).attr("id","user-avatar");
        $(dialog).append(avatar);

        var name = document.createElement("div");
        $(name).attr("id","user-name");
        $(name).text(getName(dialogs[i].login));
        $(dialog).append(name);

        var menu = document.createElement("div");
        $(menu).attr("id","menu");
        $(menu).text("...");
        $(dialog).append(menu);
        $(container).append(dialog);
    }
        $(".dialog").bind("click",selectDialog);
        $(".dialog #menu").bind("click",showOptions);
        drawMessages();
}

function getDialogs() {
    var dialogs;
    $.ajax({
        type: "POST",
        url: "../ajax/GetDialogs.php",
        async: false,
        dataType: "json",
        complete: function (result) {
            dialogs = result.responseJSON;
        },
    });
    return dialogs;
}


function validation() {
    if ($("#added-login").val().length > 4)
        return true;
    else return false;
}