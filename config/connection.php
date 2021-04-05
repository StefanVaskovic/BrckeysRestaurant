<?php
    require_once "config.php";
    
    noteNumberOfAccess();

    try {
        $conn = new PDO("mysql:host=".SERVER.";dbname=".DBNAME,USERNAME,PASSWORD);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
        noteErrorInFile($e->getMessage());
    }

    function noteNumberOfAccess()
    {
        $open = fopen(LOG_FILE,'a');
        if($open){
            $dateOfAccess = date("Y-m-d H:i:s");

            fwrite($open,$_SERVER['REQUEST_URI']."__".$_SERVER['REMOTE_ADDR']."__".$dateOfAccess."\n");
            fclose($open);
        }
    }
?>