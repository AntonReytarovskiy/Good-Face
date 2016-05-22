$(document).ready(function () {
    $("#country").change(fillCity);
});

var fillCity = function () {
    $country_id = $("#country option:selected").val();
    $.ajax({
        type: "POST",
        data: "id=" + $country_id,
        url: "../ajax/GetCity.php",
        dataType: "json",
        success: function (data) {
            for (i = 0; i < data.length; i++) {
                var option = document.createElement("option");
                $(option).attr("value",data[i].id);
                $(option).text(data[i].city_name_ru);
                $("#city").append(option);
            }
            $("#city").removeAttr("disabled");
        }
    })
}