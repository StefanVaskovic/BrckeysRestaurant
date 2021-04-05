<?php
    session_start();
    require_once "../../config/connection.php";
    require_once "functions.php";
    
    list($idEvent,$active,$datetime) = $_SESSION['eventData'];

    $query1 = "UPDATE event SET active=? WHERE idEvent = ?";
    $query2 = "UPDATE dateofevent SET idEvent = ?, date = ? WHERE idEvent = ?";

    $stmt1 = $conn->prepare($query1);
    $stmt2 = $conn->prepare($query2);

    try {
        $conn->beginTransaction();
        $stmt1->execute([$active,$idEvent]);
        $stmt2->execute([$idEvent,$datetime,$idEvent]);
        $conn->commit();
        header("Location: ../../admin.php?page=events");
    } catch (PDOException $e) {
        $conn->rollBack();
        echo $e->getMessage();
        noteErrorInFile($e->getMessage());
    }

    
?>