<?php
    @session_start();
    @$idUser = $_SESSION['user']->idUser;

    function insert(){
        global $conn;
        global $namePic;
        global $idUser;
        $alt = "uploadedAndResizedImage";

        $exists = checkIfExists();

        if($exists){
            deletePic();
        }
        
        $query = "INSERT INTO uploadedpicture(idUser,src,alt) VALUES(?,?,?)";

        $stmt = $conn->prepare($query);

        $success = $stmt->execute([$idUser,$namePic,$alt]);

        return $success ? true : false;
    }

    function checkIfExists(){
        require_once "../../config/connection.php";
        global $idUser;
        global $conn;

        $queryCheck = "SELECT * FROM uploadedpicture WHERE idUser = ?";

        try {
            $stmtCheck = $conn->prepare($queryCheck);
            $stmtCheck->execute([$idUser]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return ($stmtCheck->rowCount() == 1) ? true : false;
    }

    function deletePic(){
            require_once "../../config/connection.php";

            global $idUser;
            global $conn;

            $queryDelete = "DELETE FROM uploadedpicture WHERE idUser = ?";
            $stmtDelete = $conn->prepare($queryDelete);
            $stmtDelete->execute([$idUser]);
    }

    function getPic(){
        global $conn;
        global $idUser;

        $query = "SELECT * FROM uploadedpicture WHERE idUser = ?";

        $stmt = $conn->prepare($query);
        $stmt->execute([$idUser]);

        $pic = $stmt->fetch();
        return $pic; 
    }
?>