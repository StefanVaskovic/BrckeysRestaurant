<?php
    require_once "../../config/connection.php";
    if(isset($_POST['btnInsert'])){
        $name = $_POST['nameInsert'];
        $description = $_POST['descInsert'];
        $oldPrice = $_POST['oldPriceInsert'];
        $newPrice = $_POST['newPriceInsert'];
        $currentPrice = $newPrice == 0 || $newPrice == null ? $oldPrice : $newPrice;
        $src = $_POST['srcInsert'];
        $alt = $_POST['altInsert'];
        $recommended = $_POST['recommendedUpd'];
        $idCategory = $_POST['ddlCategory'];
        
        $query1 = "INSERT INTO picture VALUES(NULL,?,?)";
        $query2 = "INSERT INTO food VALUES(NULL,?,?,?,?,?,?,?,?)";

        $stmt1 = $conn->prepare($query1);
        $stmt2 = $conn->prepare($query2);
        try {
            $conn->beginTransaction(); 
            $successPicture = $stmt1->execute([$src,$alt]);
            $idPicture = $conn->lastInsertId();
            $successFood = $stmt2->execute([$name,$description,$oldPrice,$newPrice,$currentPrice,$idCategory,$idPicture,$recommended]);
            $conn->commit();
            header("Location: ../../admin.php?page=insertForm");
        } catch (PDOException $e) {
            $conn->rollBack();
            echo $e->getMessage();
            noteErrorInFile($e->getMessage());
        }
        
    }
?>