$(document).ready(function () {
    $("#account #hide").bind("click",hide);
});

function hide() {
    $("#account").animate({
        right: '-=260px',
    }, 600, function() {
        $("#continer").animate({
            width: "+=270px",
        },600,function () {
            $("#continer #show").css({display: "block"});
            $("#img-container img").css({marginLeft: "4.3%"});
        });
    });
}
