<?php
    require_once "../../config/connection.php";
    if(isset($_POST['btnUpdate'])){
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $query = "UPDATE contactinfo SET address=?,phone=?,email=?";

        $stmt = $conn->prepare($query);

        try {
            $success = $stmt->execute([$address,$phone,$email]);
            if($success){
                header("Location: ../../admin.php?page=reservation");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            noteErrorInFile($e->getMessage());
        }
    }
?>