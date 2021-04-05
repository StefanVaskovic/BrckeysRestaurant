<?php
    require_once "../../config/connection.php";
    if(isset($_POST['btnUpdate'])){
        $names = $_POST['nameOccasion'];
        $ids = $_POST['idsOccasion'];

        $query1 = "UPDATE occasion SET name = ? WHERE idOccasion = ?";
        $query2 = "DELETE FROM occasion WHERE idOccasion=?";

        $stmt1 = $conn->prepare($query1);
        $stmt2 = $conn->prepare($query2);

        try {
            foreach ($names as $i => $name) {
                if($name == ""){
                    $success1 = $stmt2->execute([$ids[$i]]);
                }
                $success = $stmt1->execute([$name,$ids[$i]]);
            }
            if($success){
                header("Location: ../../admin.php?page=reservation");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            noteErrorInFile($e->getMessage());
        }
    }
?>