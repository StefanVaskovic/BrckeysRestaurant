<?php
    require_once "../../config/connection.php";
    if(isset($_POST['btnUpdate'])){
        $idFood = $_POST['idFood'];
        $name = $_POST['nameUpdate'];
        $description = $_POST['descUpdate'];
        $oldPrice = $_POST['oldPriceUpdate'];
        $newPrice = $_POST['newPriceUpdate'];
        $currentPrice = $newPrice == 0 || $newPrice == null ? $oldPrice : $newPrice;
        $src = $_POST['srcUpdate'];
        $alt = $_POST['altUpdate'];
        $recommended = $_POST['recommendedUpd'];
        $idCategory = $_POST['ddlCategory'];
        $idPicture = $_POST['idPicture'];
        
        $query1 = "UPDATE food SET name=?,description=?,oldPrice=?,newPrice=?,currentPrice=?,recommended=?,idCategory=? WHERE idFood=?";
        $query2 = "UPDATE picture SET src=?,alt=? WHERE idPicture=?";

        $stmt1 = $conn->prepare($query1);
        $stmt2 = $conn->prepare($query2);
        try {
            $conn->beginTransaction();
            $successFood = $stmt1->execute([$name,$description,$oldPrice,$newPrice,$currentPrice,$recommended,$idCategory,$idFood]);
            $successPicture = $stmt2->execute([$src,$alt,$idPicture]);
            $conn->commit();
            header("Location: ../../admin.php?page=updateFormFood&id=$idFood");
        } catch (PDOException $e) {
            $conn->rollBack();
            echo $e->getMessage();
            noteErrorInFile($e->getMessage());
        }
        
    }
?>