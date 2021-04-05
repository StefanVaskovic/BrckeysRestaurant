<?php
    session_start();
    require_once "../../config/connection.php";
    require_once "functions.php";
    
    list($idEvent,$active,$datetime) = $_SESSION['eventData'];

    $query2 = "INSERT INTO dateofevent VALUES(NULL,?,?)";


    $stmt2 = $conn->prepare($query2);

    try { 
        $success = $stmt2->execute([$idEvent,$datetime]);
        if($success){
            header("Location: ../../admin.php?page=events");
        }
        
    } catch (PDOException $e) {
        echo $e->getMessage();
        noteErrorInFile($e->getMessage());
    }

    
?>