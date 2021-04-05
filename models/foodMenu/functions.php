<?php

function getFoodMenu(){
    global $conn;

    $query = "SELECT f.*,c.name as catName,p.* FROM food f INNER JOIN category c ON f.idCategory = c.idCategory INNER JOIN picture p ON f.idPicture = p.idPicture";

    $result = $conn->query($query)->fetchAll();

    return $result;
}

function getCategoriesAndNumOfPages(){
    global $conn;

    $queryCount = "SELECT COUNT(*) as total FROM category";

    $str = isset($_GET['str']) ? $_GET['str'] : 1;
    $perPage = 2;
    $stmt = $conn->query($queryCount)->fetch();
    $totalNum = $stmt->total;
    $numOfPages = ceil($totalNum/$perPage);
    $offset = ($str- 1) * $perPage;

    $query = "SELECT * FROM category c INNER JOIN picture p ON c.idPicture = p.idPicture LIMIT $perPage OFFSET $offset";

    $result = $conn->query($query)->fetchAll();

    return ["categories"=>$result,"numOfPages"=>$numOfPages];
}

function getCategoriesAndNumOfPagesPOST(){
    global $conn;

    $queryCount = "SELECT COUNT(*) as total FROM category";

    $str = isset($_POST['str']) ? $_POST['str'] : 1;
    $perPage = 2;
    $stmt = $conn->query($queryCount)->fetch();
    $totalNum = $stmt->total;
    $numOfPages = ceil($totalNum/$perPage);
    $offset = ($str- 1) * $perPage;

    $query = "SELECT * FROM category c INNER JOIN picture p ON c.idPicture = p.idPicture LIMIT $perPage OFFSET $offset";

    $result = $conn->query($query)->fetchAll();

    return ["categories"=>$result,"numOfPages"=>$numOfPages];
}


function getAllCategories(){
    global $conn;

    $query = "SELECT * FROM category";

    return getAll($query);
}