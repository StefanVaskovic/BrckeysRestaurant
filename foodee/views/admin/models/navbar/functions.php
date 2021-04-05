<?php
    function getNav(){
        global $conn;

        $query = "SELECT * FROM navbar_admin";
        $result = $conn->query($query)->fetchAll();
        return $result;
    }
?>