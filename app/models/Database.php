<?php
$dbHost = "localhost";
$dbName = "gropec";
$dbUser = "root";
$dbPassword = "";

//____________ DATABASE ____________
try {
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    new AlertModel('error', 'Erreur de connexion à la base de données : ' . $e->getMessage());
    $conn = null;
}