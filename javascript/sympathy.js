$(document).ready(function () {
    $("#nav p").bind("click",selectMenu);
    drawPeoples();
});

var selectedMenu = "Вы понравились";
function selectMenu() {
    $(".selected-nav").removeClass("selected-nav");
    $(this).addClass("selected-nav");
    selectedMenu = $(this).text();
    drawPeoples();
}

function drawPeoples() {
    var peoples = getPeoples();
    // <div class="people">
    //     <img src="image/avatar.jpg" alt="avatar">
    //         <div id="name">Антон Рейтаровский</div>
    //         <div id="date">1990-06-13 17:39:20</div>
    //         <div id="state">
    //             <img src="image/nosympathy.png" alt="no">
    //                 <p>Не взаимно</p>
    //         </div>
    // </div>
    var container = $("#sympathy #body");
    $(container).empty();
    if (!peoples)
        return;
    for (i = 0; i < peoples.length; i++) {
        var people = document.createElement("div");
        $(people).addClass("people");

        var avatar = document.createElement("img");
        avatar.login = peoples[i].login;
        $(avatar).bind("click",openProfile);
        $(avatar).attr("src",peoples[i].avatar);
        $(people).append(avatar);

        var name = document.createElement("div");
        name.login = peoples[i].login;
        $(name).bind("click",openProfile);
        $(name).attr("id","name");
        $(name).text(peoples[i].name);
        $(people).append(name);

        var date = document.createElement("div");
        $(date).attr("id","date");
        $(date).text(peoples[i].date);
        $(people).append(date);

        $(container).append(people);
    }
}

function getPeoples() {
    var result;
    if (selectedMenu == "Вы понравились")
        $.ajax({
            type: "POST",
            url: "../ajax/GetILike.php",
            datatype: "json",
            async: false,
            complete: function (sympathy) {
                result = sympathy.responseJSON;
            }
        });
    else if (selectedMenu == "Взаимные")
        $.ajax({
            type: "POST",
            url: "../ajax/GetMutuallyLikes.php",
            async: false,
            complete: function (sympathy) {
                console.log(sympathy.responseJSON);
                result = sympathy.responseJSON;
            }
        });
    else $.ajax({
            type: "POST",
            url: "../ajax/GetMeLike.php",
            datatype: "json",
            async: false,
            complete: function (sympathy) {
                console.log(sympathy);
                result = sympathy.responseJSON;
            }
        });
    return result;
}

function openProfile() {
    document.location.href = "http://good-face/profile.php?login=" + this.login;
}