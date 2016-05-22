<?php
/**
 * Created by PhpStorm.
 * User: Антоша
 * Date: 22.04.2016
 * Time: 3:31
 */
include "../database/Database.php";
$database = new Database();
if ($database->DeletePhotoByID($_POST["id"]))
    echo "1";
else echo "0";