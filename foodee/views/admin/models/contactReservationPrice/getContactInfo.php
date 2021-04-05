<?php
    require_once ABSOLUTE_PATH."views/admin/config/connection.php";

    $query = "SELECT * FROM contactinfo";

    $info = $conn->query($query)->fetch();
?>