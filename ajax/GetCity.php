<?php
if (isset($_POST["id"])) {
    $id_country = $_POST["id"];
    include "../database/Database.php";
    $database = new Database();
    $city = $database->GetCityByCountryID($id_country);
    echo json_encode($city);
}