<?php
    session_start();
    require_once "../../config/connection.php";
    require_once "functions.php";
    if (isset($_POST['btnUpdate'])) {
        $idEvent = $_POST['idEvent'];
        $active = $_POST['ddlEventIsActive'];
        $date = $_POST['eventDateUpdate'];
        $time = $_POST['eventTimeUpdate'];
        $datetime = $date." ".$time;

        $query1 = "UPDATE event SET active=? WHERE idEvent = ?";
        $query2 = "INSERT INTO dateofevent VALUES(NULL,?,?)";
        $query3 = "UPDATE dateofevent SET idEvent = ?, date = ? WHERE idEvent = ?";
        $query4 = "SELECT COUNT(*) as number,date FROM dateofevent WHERE idEvent = ?";

        $_SESSION['eventData'] = [$idEvent,$active,$datetime];
        

        $currentDateTimestamp = time();

        $stmt1 = $conn->prepare($query1);

        try {
            $stmt1->execute([$active,$idEvent]);
            if($active){
                $stmt4 = $conn->prepare($query4);
                $stmt4->execute([$idEvent]);
                $obj = $stmt4->fetch();
                $dbDate = $obj->date;
                $count = $obj->number;
                $datetimeTimestamp = strtotime($datetime);
                $dbDateTimestamp = strtotime($dbDate);
                $oneDayInSeconds = 86400;

                if($currentDateTimestamp + $oneDayInSeconds< $datetimeTimestamp && $count>=1 && $dbDateTimestamp + $oneDayInSeconds < $datetimeTimestamp){
                    header("Location: ../../admin.php?page=addOrActivate&id=$idEvent");
                }elseif($currentDateTimestamp + $oneDayInSeconds >= $datetimeTimestamp && $dbDateTimestamp + $oneDayInSeconds >= $datetimeTimestamp){
                    $_SESSION['errorEvent'] = "Date you entered may be equal to current date, or you tried to add another event before 24h distinction.";
                    header("Location: ../../admin.php?page=updateFormEvent&id=$idEvent");
                }else {
                    if(strtotime($date) == 0 || strtotime($time) == 0){
                        header("Location: ../../admin.php?page=updateFormEvent&id=$idEvent");
                    }else{
                        header("Location: ../../admin.php?page=addOrActivate&id=$idEvent&confirm=true");
                    }
                    
                }
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            noteErrorInFile($e->getMessage());
        }

    }
?>