<?php
require_once('config.php');

try {

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    $db = new PDO($dsn, $user, $pass, $opt);
    $sql = "SELECT c.id, c.name FROM `" .$table_city. "` c WHERE c.state_id=:stateid";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':stateid', $q, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll();

    echo json_encode($result);
} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}

$db = null; 