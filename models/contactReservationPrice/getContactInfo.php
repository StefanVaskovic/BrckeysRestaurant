<?php
    require_once ABSOLUTE_PATH."config/connection.php";

    $query = "SELECT * FROM contactinfo";

    $info = $conn->query($query)->fetch();
?>