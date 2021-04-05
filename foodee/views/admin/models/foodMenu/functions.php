<?php



function getFoodMenu(){
    global $conn;

    $query = "SELECT f.*,c.name as catName,p.* FROM food f INNER JOIN category c ON f.idCategory = c.idCategory INNER JOIN picture p ON f.idPicture = p.idPicture";

    $result = $conn->query($query)->fetchAll();

    return $result;
}

function getOneFood($id){
    global $conn;

    $query = "SELECT f.*,c.name as catName,p.* FROM food f INNER JOIN category c ON f.idCategory = c.idCategory INNER JOIN picture p ON f.idPicture = p.idPicture WHERE idFood = ?";

    $result = $conn->prepare($query);
    $result->execute([$id]);
    $food = $result->fetch();

    return $food;
}

function getCategories(){
    $query = "SELECT * FROM category";

    return getAll($query);
}
