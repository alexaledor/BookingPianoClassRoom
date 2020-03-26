<?php
//Побудова таблиці зарезервованих інтервалів часу у класі
session_start();
require_once('../class/Database.class.php');
$database = new Database();
$arr = [];
$date = Date('Y-m-d');

if (isset($_POST['id_class_room'])){
    $id_class_room = $_POST['id_class_room'];
} else {
    echo json_encode(['error']);
    exit;
}

$sql = "SELECT reserve.ID as ID,
               reserve.DATE as DATE,
               reserve.USER_ID as USER_ID,
               reserve.PART_TIME as PART_TIME,
               users.FIRST_NAME as FIRST_NAME,
               users.LAST_NAME as LAST_NAME,
               users.UNIT as UNIT,
               unit.NAME as UNIT_NAME,
               course.NAME as COURSE_NAME,
               users.LOGIN as LOGIN
               FROM reserve                  
               INNER JOIN users ON reserve.USER_ID = users.ID
               INNER JOIN unit ON users.UNIT = unit.ID 
               INNER JOIN course ON users.COURS = course.ID  
               WHERE reserve.DATE = '$date' AND reserve.CLASS_ROOM_ID = $id_class_room  
               ORDER BY reserve.PART_TIME ";

$res = $database->getDataFromDb($sql);

while ($row = $res->fetch_assoc()) {
    $subArr = [
        'ID' => $row['ID'],
        'DATE' => $row['DATE'],
        'USER_ID' => $row['USER_ID'],
        'FIRST_NAME' => $row['FIRST_NAME'],
        'LAST_NAME' => $row['LAST_NAME'],
        'COURSE' => $row['COURSE_NAME'],
        'UNIT' => $row['UNIT_NAME'],
        'LOGIN' => $row['LOGIN'],
        'PART_TIME' => $row['PART_TIME'],
        'THIS_LOGIN' => $_SESSION['name']
    ];
    array_push($arr,$subArr);
}
echo json_encode($arr);