<?php
require_once('config.php');

try {

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    $db = new PDO($dsn, $user, $pass, $opt);
    $sql = "SELECT * FROM `" . $table_state . "` s WHERE s.name LIKE ?";

    $stmt = $db->prepare($sql);
    $params = array("%$q%");
    $stmt->execute($params);

    echo json_encode($stmt->fetchAll());
} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}

$db = null; 