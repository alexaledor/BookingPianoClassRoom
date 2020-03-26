<?php
//Створення селекта класів в залежності від будинку
require_once('../class/Database.class.php');
$database = new Database();
$arr = [];

$building = (isset($_POST['building']))? $_POST['building'] : '';
if ($building == ''){
    header('Location: ../');
    exit;
}

$sql = "SELECT * FROM classroom WHERE BUILDING_ID = $building ORDER BY NAME";
$res = $database->getDataFromDb($sql);
while ($row = $res->fetch_assoc()) {
    $subArr = [
        'ID' => $row['ID'],
        'NAME' => $row['NAME'],
    ];
    array_push($arr,$subArr);
}
echo json_encode($arr);