<?php
    ob_start();
    require_once "../../config/connection.php";
    if(isset($_POST['btnInsert'])){
        $newOccasion = $_POST['newOccasion'];
        
        $query = "INSERT INTO occasion VALUES(NULL,?)";

        $stmt = $conn->prepare($query);

        try {
            if($newOccasion == ""){
                header("Location: ../../admin.php?page=reservation");
            }else{
                $success = $stmt->execute([$newOccasion]);
                if($success){
                    header("Location: ../../admin.php?page=reservation");
                }
            }      
        } catch (PDOException $e) {
            echo $e->getMessage();
            noteErrorInFile($e->getMessage());
        }
    }
?>