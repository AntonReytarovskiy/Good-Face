$(document).ready(function () {
    $("#viewer #close").bind("click",function () {
        $("#viewer").animate({
            opacity: "-=1",
        },500,function () {
            $("#viewer").css({display: "none"});
            $("#viewer").css({opacity: "0.8"});
        });
    });
    $("img").bind("click",showViewer);
});

var showViewer = function () {
    var src = $(this).attr("src");
    var interval = setInterval(function () {
        $("#view-img").attr("src",src);
        $("#view-img").css({
            maxWidth: "650px",
            maxHeight: "500px"
        });
        $("#viewer").css({
            width: $("#view-img").width(),
            height: $("#view-img").height()
        });
        $("#viewer").show();
        if ($("#viewer").width() > 0)
            clearInterval(interval);
    },1);
}
