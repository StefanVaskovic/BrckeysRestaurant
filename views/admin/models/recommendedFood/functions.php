<?php
    require_once ABSOLUTE_PATH."/models/functions.php";
    function getRecommendedFood(){
        $query = "SELECT * FROM food f INNER JOIN picture p ON f.idPicture = p.idPicture WHERE recommended = 1";

        return getAll($query);
    }
?>