<?php
    header("Content-type: application/json");
    session_start();
    require_once "../../config/connection.php";
    require_once ABSOLUTE_PATH. "models/events/functions.php";
    $data = null;
    $code = 404;
    if(isset($_POST['sent']) && isset($_SESSION['user'])){
       $idDOE = $_POST['idDOE'];
       $idEvent = $_POST['idEvent'];
       $idUser = $_SESSION['user']->idUser;

       $votes = numberOfVotes();
       if($votes == 0){
            try {
                $insert = insertPeople();
                if($insert){
                    $code = 202;
                    $data = peopleWhoPressedCountOnLink($idDOE);
                }else{
                    $code = 422;
                }
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                noteErrorInFile($e->getMessage());
                $code = 500;
            }
        }else{
            $code = 409;
        }
    }
    echo json_encode($data);
    http_response_code($code);
?>