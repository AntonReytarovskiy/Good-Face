$(document).ready(function () {
    if ($("div").is("#login"))
        $("#login").animate({
            top: "+=400px",
        },800);
    else
        $("#regestration").animate({
            top: "+=550px",
        },800);
});