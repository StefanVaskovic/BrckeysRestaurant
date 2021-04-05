<?php
    ob_start();
    require_once "../../config/connection.php";
    require_once "functions.php";
    header("Content-type: application/json");
    session_start();
    $data = null;
    $code = 404;
    if(isset($_POST['sent'])){
        $idUser = $_SESSION['user']->idUser;
        $idOccasion = !empty($_POST['idOccasion']) ? $_POST['idOccasion'] : null ;
        $date = !empty($_POST['date']) ? $_POST['date'] : null;
        $time = !empty($_POST['time']) ? $_POST['time'] : null;
        $numOfPpl = !empty($_POST['numOfPpl']) ? $_POST['numOfPpl'] : null;
        $msg = $_POST['msg'];

        $numberOfPplDiscount = getNumberOfPersonsDiscount();
        foreach ($numberOfPplDiscount as $item) {
            if(strpos($item->name,'-') !== false) {
                $itemArr = explode("-",$item->name);
                list($firstNum,$secondNum) = $itemArr;

                if($numOfPpl < $firstNum){
                    $idNOP = null;
                    $discount = 0;
                    break;
                }
                if($numOfPpl >= $firstNum && $numOfPpl <= $secondNum){
                    $idNOP = $item->idNOP;
                    $discount = $item->discount;
                    break;
                }
            } else {
                $lastNum = explode("-",$item->name)[0];

                if($numOfPpl == $lastNum || $numOfPpl > $lastNum){
                    $idNOP = $item->idNOP;
                    $discount = $item->discount;
                    break;
                }
            }
        }

        if($idNOP == null){
            insertIfNull();
        }else{
            insertIfNotNull();
        }
    }
    echo json_encode($data);
    http_response_code($code);
  

?>