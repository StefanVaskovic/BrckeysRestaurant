<?php
    require_once "../../config/connection.php";
    if(isset($_POST['btnUpdate'])){
        $price = $_POST['priceNumber'];

        $query = "UPDATE price_per_person SET price = ?";

        $stmt = $conn->prepare($query);
        try {
            $success = $stmt->execute([$price]);
            if($success){
                header("Location: ../../admin.php?page=reservation");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            noteErrorInFile($e->getMessage());
        }
    }
?>