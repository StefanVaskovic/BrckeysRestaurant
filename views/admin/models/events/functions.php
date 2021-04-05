<?php
    require_once ABSOLUTE_PATH."models/functions.php";

    function getDateEvent($datetime){
        $datetime = substr($datetime,0,-3);
        $datetimeArr = explode(" ",$datetime);
        list($date,$time) = $datetimeArr;

        $dateArr = explode("-",$date);
        list($year,$month,$day) = $dateArr;

        return $year."-".$month."-".$day;
    }

    function getTimeEvent($datetime){
        $datetime = substr($datetime,0,-3);
        $datetimeArr = explode(" ",$datetime);
        list($date,$time) = $datetimeArr;

        return $time;
    }

    function getOneEvent($id){
        global $conn;
        $query = "SELECT * FROM event WHERE idEvent = ?";

        $stmt = $conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function getActiveEvent($id){
        global $conn;
        $query = "SELECT * FROM event e INNER JOIN dateofevent doe ON e.idEvent=doe.idEvent WHERE e.idEvent = ? AND e.active = 1";

        $stmt = $conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function getEvents(){
        $query = "SELECT * FROM event e INNER JOIN dateofevent d ON e.idEvent = d.idEvent WHERE active = 1";

        return getAll($query);
    }

    function getAllEvents(){
        $query = "SELECT * FROM event";

        return getAll($query);
    }

    function modifyDate($datetime){
        $datetime = substr($datetime,0,-3);
        $datetimeArr = explode(" ",$datetime);
        list($date,$time) = $datetimeArr;
        $dateTextArr = ["January","February","March","April","May","June","July","August","September","October","November","December"];

        $dateArr = explode("-",$date);
        list($year,$month,$day) = $dateArr;
        if(substr($month,0,1)=="0"){
            $month = substr($month,1,1);
        }
        $monthText = $dateTextArr[$month-1];
        $dateText = $monthText." ".$day."th, ".$year;
        
        $modified = "Date: ".$dateText."<br/>"."Time: ".$time;

        return $modified;
    }

    

    function peopleWhoPressedCountOnLink($id){
        global $conn;
        $query = "SELECT COUNT(*) as numOfPpl FROM user_dateofevent ud INNER JOIN dateofevent d ON ud.idDateOfEvent = d.idDateOfEvent WHERE d.idDateOfEvent = $id";

        return $conn->query($query)->fetch()->numOfPpl;
    }

    function insertPeople(){
        global $conn;
        global $idUser;
        global $idDOE;

        $query = "INSERT INTO user_dateofevent VALUES(NULL,?,?)";

        $stmt = $conn->prepare($query);
        return $stmt->execute([$idDOE,$idUser]);
    }

    function numberOfVotes(){
        global $conn;
        global $idDOE;
        global $idUser;

        $query = "SELECT COUNT(*) as numOfPpl FROM user_dateofevent WHERE idDateOfEvent = ? AND idUser = ?";

        $stmt = $conn->prepare($query);
        $stmt->execute([$idDOE,$idUser]);
        $number = $stmt->fetch()->numOfPpl;

        return $number;
    }
?>