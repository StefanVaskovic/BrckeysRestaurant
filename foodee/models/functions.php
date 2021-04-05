<?php

function getAll($query){
    global $conn;
    $result = $conn->query($query)->fetchAll();

    return $result;
}

function getOne($query){
    global $conn;
    $result = $conn->query($query)->fetch();

    return $result;
}

function noteErrorInFile($msg){
    $file = fopen(ERROR_FILE,"a");

    if($file){
        fwrite($file,$msg."\n");
        fclose($file);
    }
}
