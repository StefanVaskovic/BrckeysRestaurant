<?php
    require_once "../../config/connection.php";
    if(isset($_GET['idDateOfEvent'])){
        $idDateOfEvent = $_GET['idDateOfEvent'];
        $idEvent = $_GET['idEvent'];

        $query1 = "SELECT COUNT(*) as number FROM dateofevent WHERE idEvent = ?";
        $query2 = "DELETE FROM dateofevent WHERE idDateOfEvent = ?";
        $query3 = "UPDATE event SET active = 0 WHERE idEvent = ?";

        $stmt1 = $conn->prepare($query1);
        $stmt2 = $conn->prepare($query2);

        try {
            $conn->beginTransaction();
            $stmt2->execute([$idDateOfEvent]);
            $stmt1->execute([$idEvent]);
            $number = $stmt1->fetch()->number;
            if($number < 1){
                $stmt3 = $conn->prepare($query3);
                $stmt3->execute([$idEvent]);
            }
            $conn->commit();
            header("Location: ../../admin.php?page=events");
        } catch (PDOException $e) {
            $conn->rollBack();
            echo $e->getMessage();
            noteErrorInFile($e->getMessage());
        }
    }
?>