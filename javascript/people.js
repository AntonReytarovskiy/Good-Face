var Peoples = function () {
    this.last_id = 0;
    this._peoples = this.getPeoples();
}

Peoples.prototype.getPeoples = function () {
    var peoples;
    $.ajax({
        datatype: "json",
        type: "POST",
        url: "../ajax/GetPeoples.php",
        data: "last_id=" + this.last_id,
        async: false,
        complete: function (result) {
            peoples = result.responseJSON;
        }
    });
    return peoples;
}

Peoples.prototype.next = function () {
    if (this._peoples.length == 0) {
        this._peoples = this.getPeoples();
        if (this._peoples.length == 0)
            return false;
        this.last_id = this._peoples[this._peoples.length - 1].ID;
    }
    return this._peoples.pop();
}


var peoples,
    selectedPeople,
    avatar,
    userName;
$(document).ready(function () {
    peoples = new Peoples();
    avatar = $("#people #people-avatar img");
    userName = $("#people #people-avatar #name");
    drawPeople();

    $("#people #people-avatar img").load(function () {
        $("#people #name").width($("#people #people-avatar img").width());
    });
    $("#open-profile").bind("click",openProfile);
    $("#skip").bind("click",skip);
    $("#message").bind("click",showMessageBox);
    $("#sympathy").bind("click",sendSympathy);
});

function sendSympathy() {
    $.ajax({
        type: "POST",
        url: "../ajax/SendSympathy.php",
        data: "login=" + selectedPeople.login,
        datatype: "text",
        success: function () {
            drawPeople();
        }
    });
}

function drawPeople() {
    selectedPeople = peoples.next();
    if (!selectedPeople) {
        noPeople();
        return;
    }
    $(avatar).attr("src",selectedPeople.avatar);
    $(userName).text(selectedPeople.fname + " " + selectedPeople.lname);
}

function noPeople() {
    $("#menu,#people-avatar").css("display","none");
    $("#no-people").css("display","block");
    $("#no-people").animate({
        top: "+=500px",
    },800,function () {
    });
}

function openProfile() {
    document.location.href = "http://good-face/profile.php?login=" + selectedPeople.login;
}

function skip() {
    drawPeople();
}

function showMessageBox() {
    var messageBox = $("#message-box");
    if ($(messageBox).css("display") == "none") {
        $(messageBox).css("display","block");
        $(messageBox).animate({
            top: "-=370px",
        },300);
        $(messageBox).children("#send-message").bind("click",sendMessage);
    } else {
        $(messageBox).animate({
            top: "+=370px"
        },300,function () {
            $(messageBox).css("display","none");
            $(messageBox).children("#send-message").unbind("click",sendMessage);
        });
    }
}

function sendMessage() {
    if ($("#message-text").val().length == 0)
        return;
    var login = selectedPeople.login;
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