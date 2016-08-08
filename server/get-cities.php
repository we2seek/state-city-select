<?php
require_once('config.php');

try {

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    $db = new PDO($dsn, $user, $pass, $opt);
    $sql = "SELECT c.id AS 'city_id', c.name AS 'city_name', s.name AS 'state_name' FROM `" .$table_city. "` c LEFT JOIN `" .$table_state. "` s ON c.state_id=s.id WHERE c.name LIKE ?";

    $stmt = $db->prepare($sql);
    $params = array("%$q%");
    $stmt->execute($params);

    $rows = $stmt->fetchAll();
    $result = array();

    foreach ($rows as $row) {
        $result[$row['state_name']][] = array("id"=>$row['city_id'], "name"=>$row['city_name']);
    }

    echo json_encode($result);
} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}

$db = null; 