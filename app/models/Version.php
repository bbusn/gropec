<?php
//____________ GET VERSION DETAILS ____________
function get_version() {
    require('app/models/Database.php');
    $stmt = $conn->prepare('SELECT number, description FROM gpc_version ORDER BY date DESC LIMIT 1');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}