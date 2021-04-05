<?php
    require_once ABSOLUTE_PATH."models/functions.php";

    $query = "SELECT text FROM aboutUs";
    $aboutUs = getOne($query)->text;
?>