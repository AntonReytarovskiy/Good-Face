var imgWidth;
var imgHeight;

$(document).ready(function () {
    $("img").bind("click",showViewer);
    $("#upload-button").bind("click",function () {
        $("#upload-photo").show(100);
    });
    $("#user #upload-photo #close").bind("click",function () {
        $("#upload-photo").hide(100);
        if ($("#upload-photo p").is("#Error"))
            window.location = "account.php";
    });

    if ($("#upload-photo p").is("#Error"))
        $("#upload-photo").show(100);

    $("#account").height($(document).height() - 20);
    $("#set-avatar").bind("click",setAvatar);
    $("#delete").bind("click",deletePhoto);
});

function setAvatar() {
    var path = $("#view-img").attr("src");
    $.ajax({
        type: "POST",
        data: "path=" + path,
        url: "../ajax/GetPhotoByPath.php",
        dataType: "json",
        success: function (photo) {
            $.ajax({
                type: "POST",
                data: "id=" + photo.ID,
                url: "../ajax/SetAvatar.php",
                dataType: "text",
                success: function (result) {
                    if (result)
                        location.reload();
                    else alert("Что-то пошло не так :(");
                }
            })
        }
    });
}

function deletePhoto() {
    var path = $("#view-img").attr("src");
    $.ajax({
        type: "POST",
        data: "path=" + path,
        url: "../ajax/GetPhotoByPath.php",
        dataType: "json",
        success: function (photo) {
            $.ajax({
                type: "POST",
                data: "id=" + photo.ID,
                url: "../ajax/DeletePhoto.php",
                dataType: "text",
                success: function (result) {
                    if (result)
                        location.reload();
                    else alert("Что-то пошло не так :(");
                }
            })
        }
    });
}