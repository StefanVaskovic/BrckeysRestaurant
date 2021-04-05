<?php
header("Content-Type: application/json");
require_once "../../config/connection.php";
require_once "../functions.php";
require_once "../foodMenu/functions.php";
$data = null;
$code = 404;
if (isset($_POST['sent'])) {
    $idCategory = $_POST['idCategory'];
    $sortValue = $_POST['sortValue'];

    $queryFood = "SELECT f.*,c.name as catName,p.* FROM food f INNER JOIN category c ON f.idCategory = c.idCategory INNER JOIN picture p ON f.idPicture = p.idPicture";


    if ($idCategory != 0) {
        $queryCount = "SELECT COUNT(*) as total FROM category WHERE idCategory = $idCategory";
    } else {
        $queryCount = "SELECT COUNT(*) as total FROM category";
    }

    $str = isset($_POST['str']) ? (int) $_POST['str'] : 1;
    $perPage = 2;
    $stmt = $conn->query($queryCount)->fetch();
    $totalNum = $stmt->total;
    $numOfPages = ceil($totalNum / $perPage);
    $offset = ($str - 1) * $perPage;

    $test = [];
    $queryCategory = "SELECT * FROM category c INNER JOIN picture p ON c.idPicture = p.idPicture ";

    if ($idCategory != 0 || $sortValue != 0) {
        $test[] = "prvi if";
        if ($idCategory == 0 && $sortValue != 0) {
            $queryCategory .= " LIMIT $perPage OFFSET $offset";
            $test[] = "Prvi if u ifu";
        } else {
            $queryFood .= " WHERE f.idCategory = ?";
            $queryCategory .= " WHERE idCategory = ? ";
            $test[] = "Prvi else";
        }
    }
    if ($sortValue == 1) {
        $test[] = "drugi if";
        $queryFood .= " ORDER BY oldPrice";
    } elseif ($sortValue == 2) {
        $test[] = "prvi elseif";
        $queryFood .= " ORDER BY oldPrice DESC";
    }

    $stmt = $conn->prepare($queryFood);
    $stmt2 = $conn->prepare($queryCategory);
    try {
        if ($idCategory != 0 || $sortValue != 0) {
            $test[] = "treci if";

            if ($idCategory == 0 && $sortValue != 0) {
                $test[] = "drugi if u ifu";
                $success = $stmt->execute();
                $success2 = $stmt2->execute([$idCategory]);
            } else {
                $test[] = "drugi else";
                $success = $stmt->execute([$idCategory]);
                $success2 = $stmt2->execute([$idCategory]);
            }
        } else {
            $test[] = "treci else";
            $success = $stmt->execute();
        }

        if($idCategory == 0 && $sortValue == 0){
           $getCategoriesAndNumOfPages = getCategoriesAndNumOfPagesPOST();    
           $getFoodMenu = getFoodMenu();
           $test[] = "cetvrti if";
           
           $data = ["food" => $getFoodMenu, "category" => $getCategoriesAndNumOfPages['categories'], "numOfPages" => $getCategoriesAndNumOfPages['numOfPages'], "str" => $str,"test"=>$test];
        }
        else{
            if ($success) {
                $data = ["food" => $stmt->fetchAll(), "category" => $stmt2->fetchAll(), "numOfPages" => $numOfPages, "str" => $str,"test"=>$test];
                $code = 201;
            } else {
                $code = 409;
            }
        }  
    } catch (PDOException $e) {
        $code = 500;
        echo $e->getMessage();
        noteErrorInFile($e->getMessage());
    }
}

echo json_encode($data);
http_response_code($code);
