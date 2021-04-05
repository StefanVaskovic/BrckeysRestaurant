<?php
    require_once "statistics/functions.php";
    session_start();
    if(isset($_SESSION['user'])){
        deleteLoggedInUsers($_SESSION['user']->idUser);
        unset($_SESSION['user']);

        header("Location: ../index.php?page=home");
    }
?>