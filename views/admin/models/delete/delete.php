<?php
    require_once "../../config/connection.php";
    if(isset($_GET['id'])){
        $idFood = $_GET['id'];

        $query = "DELETE FROM food WHERE idFood = ?";
        $stmt = $conn->prepare($query);
        try {
            $success = $stmt->execute([$idFood]);
            if($success){
                header("Location: ../../admin.php");
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            noteErrorInFile($e->getMessage());
        }
    }
?>