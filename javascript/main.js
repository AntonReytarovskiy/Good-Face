$(document).ready(function () {
    console.log($(document).height());
    $("#continer").height($(window).height() - 20);
    if (!$("div").is("#account"))
        $("#continer").css({width: '+=260px',});
    $("#continer #show").bind("click",show);
});

function show() {
    $("#continer").animate({
        width: '-=270px',
    }, 600, function() {
        $("#account").animate({
            right: "+=260px",
        },600,function () {
            $("#img-container img").css({marginLeft: "2.6%"});
            $("#continer #show").css({display: "none"});
        });
    });
}