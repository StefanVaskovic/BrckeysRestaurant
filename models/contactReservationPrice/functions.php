<?php
    require_once ABSOLUTE_PATH."models/functions.php";

    function getNumberOfPersonsDiscount(){
        $query = "SELECT * FROM numberofpersonsdiscount";

        return getAll($query);
    }

    function getOccasion(){
        $query = "SELECT * FROM occasion ORDER BY idOccasion";

        return getAll($query);
    }

    function getPricePerPerson(){
        global $conn;
        $query = "SELECT price FROM price_per_person";

        return $conn->query($query)->fetch()->price;
    }

    function insertIfNotNull(){
        global $conn;
        global $idOccasion;
        global $date;
        global $time;
        global $numOfPpl;
        global $msg;
        global $idUser;
        global $code;
        global $idNOP;
        global $discount;

        $pricePerPerson = getPricePerPerson();
        $price = $pricePerPerson * $numOfPpl * ((100 - $discount) / 100);
        $query1 = "INSERT INTO reservationform(idOccasion,date,time,message,NOP) VALUES(?,?,?,?,?)";
        $query2 = "INSERT INTO reservationformdiscount(idReservationForm,idNOP) VALUES(?,?)";
        $query3 = "INSERT INTO reservationform_user(idReservationForm,idUser) VALUES(?,?)";
        $query4 = "INSERT INTO reservationfinal(idRFU,price) VALUES(?,?)";
        $stmt1 = $conn->prepare($query1);
        $stmt2 = $conn->prepare($query2);
        $stmt3 = $conn->prepare($query3);
        $stmt4 = $conn->prepare($query4);

        try {
            $conn->beginTransaction();
            $stmt1->execute([$idOccasion,$date,$time,$msg,$numOfPpl]);
            $idReservationForm = $conn->lastInsertId();
            $stmt2->execute([$idReservationForm,$idNOP]);
            $stmt3->execute([$idReservationForm,$idUser]);
            $idRFU = $conn->lastInsertId();
            $stmt4->execute([$idRFU,$price]);
            $conn->commit();
            
            $code = 201;
            

        } catch (PDOException $e) {

            $code = 409;

            $conn->rollBack();

            if($e->errorInfo[1] == 1048){
                $code = 422;
            }else{
                $code = 500;
            } 
            // var_dump($e->errorInfo);
            // echo $e->getMessage();
        }
    }

    function insertIfNull(){
        global $conn;
        global $idOccasion;
        global $date;
        global $time;
        global $numOfPpl;
        global $msg;
        global $idUser;
        global $code;

        $pricePerPerson = getPricePerPerson();
        $price = $pricePerPerson * $numOfPpl;
        $query1 = "INSERT INTO reservationform(idOccasion,date,time,message,NOP) VALUES(?,?,?,?,?)";
        $query2 = "INSERT INTO reservationform_user(idReservationForm,idUser) VALUES(?,?)";
        $query3 = "INSERT INTO reservationfinal(idRFU,price) VALUES(?,?)";
        $stmt1 = $conn->prepare($query1);
        $stmt2 = $conn->prepare($query2);
        $stmt3 = $conn->prepare($query3);

        
        
        try {
            $conn->beginTransaction();
            $stmt1->execute([$idOccasion,$date,$time,$msg,$numOfPpl]);
            $idReservationForm = $conn->lastInsertId();
            $stmt2->execute([$idReservationForm,$idUser]);
            $idRFU = $conn->lastInsertId();
            $stmt3->execute([$idRFU,$price]);
            $conn->commit();
            
            $code = 201;
            

        } catch (PDOException $e) {

            $code = 409;

            $conn->rollBack();

            if($e->errorInfo[1] == 1048){
                $code = 422;
            }else{
                $code = 500;
            } 
            // var_dump($e->errorInfo);
            // echo $e->getMessage();
        }
    }
?>