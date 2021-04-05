<?php
    require_once "../../config/connection.php";
    if(isset($_POST['btnUpdate'])){
        $idNOP = $_POST['idNOP'];
        $numOfPersons = $_POST['numOfPersons'];
        $discount = $_POST['discount'];
        
        $query = "UPDATE numberofpersonsdiscount SET name = ?,discount = ? WHERE idNOP = ?";

        $j = 0;
        $lastElement = end($numOfPersons);
        $beforeLastElement = prev($numOfPersons);
        for ($i=0;$i<count($discount);$i++) { 
           if(($discount[$i] == 0)){
               header("Location: ../../admin.php?page=reservation&greska=da");
           }
        }
        for ($j=0;$i<count($numOfPersons);$j++) {
            if($numOfPersons[$j]!=$lastElement){
                $names[] = $numOfPersons[$j] . "-" . $numOfPersons[$j+1];
            }
            else{
                $names[] = $numOfPersons[$j] . "+";
                break;
            }
           
        } 
        foreach ($names as $i => $item) {
            if($i % 2 == 0){
                $neededNames[] = $item;
            }
        }
        foreach ($neededNames as $i => $item) {
            if($item==0 || $item==null){
                $item = "0+";
            }
            $stmt = $conn->prepare($query);
            try {
                $success = $stmt->execute([$item,$discount[$i],$idNOP[$i]]);
                if($success){
                    header("Location: ../../admin.php?page=reservation");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                noteErrorInFile($e->getMessage());
            }
        }
             
    }
?>