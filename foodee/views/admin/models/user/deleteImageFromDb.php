<?php
    require_once "functions.php";
    require_once "../../config/connection.php";

    $exists = checkIfExists();

    if($exists){
        deletePic();
        header("Location: ../../admin.php?page=changeProfilePic");
    }else{
        $_SESSION['errors'] = ["You don't have profile picture already."];
        header("Location: ../../admin.php?page=changeProfilePic");
    }
?>