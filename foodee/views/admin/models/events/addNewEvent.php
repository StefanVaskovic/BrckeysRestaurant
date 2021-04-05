<?php
    require_once "../../config/connection.php";
    if(isset($_POST['btnInsert'])){
        $name = $_POST['nameInsert'];
        $description = $_POST['descriptionInsert'];

        $query = "INSERT INTO event VALUES(NULL,?,0,?)";

        $stmt = $conn->prepare($query);
        try {
            $success = $stmt->execute([$name,$description]);
            if($success){
                header("Location: ../../admin.php?page=events");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            noteErrorInFile($e->getMessage());
        }
    }
?>