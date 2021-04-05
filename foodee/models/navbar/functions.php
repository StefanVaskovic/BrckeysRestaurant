<?php
    function getNav(){
        global $conn;

        $query = "SELECT * FROM navbar";
        $result = $conn->query($query)->fetchAll();
        return $result;
    }
?>