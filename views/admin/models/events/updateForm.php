<?php
    require_once "../../config/connection.php";
    require_once "functions.php";
    if (isset($_POST['btnUpdate'])) {
        $idEvent = $_POST['idEvent'];
        $name = $_POST['nameUpdate'];
        $description = $_POST['descUpdate'];

        $query1 = "UPDATE event SET name=?,description=? WHERE idEvent = ?";

        $currentDateTimestamp = time();

        $stmt1 = $conn->prepare($query1);

        try {
            $success = $stmt1->execute([$name,$description,$idEvent]);
            if($success){
                header("Location: ../../admin.php?page=events");
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            noteErrorInFile($e->getMessage());
        }

    }
?>