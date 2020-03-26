<?php
//Резервування класу
session_start();
require_once('../class/Database.class.php');
$database = new Database();

$date = Date('Y-m-d');
$user_id = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : '';
$part_time = (isset($_POST['part_time'])) ? $_POST['part_time'] : '';
$id_class_room = (isset($_POST['id_class_room'])) ? $_POST['id_class_room'] : '';

if (($user_id == '') || ($part_time == '') || ($id_class_room == '')) {
    header('Location: ../');
    exit;
}

$sql = "SELECT * FROM reserve WHERE DATE = '$date' AND PART_TIME = $part_time AND CLASS_ROOM_ID = $id_class_room";
$res = $database->getDataFromDb($sql);
$row = $res->fetch_assoc();

if (count($row) > 0) {
    echo 'late';
} else {
    $sql = "INSERT INTO reserve (DATE,USER_ID,PART_TIME,CLASS_ROOM_ID) VALUES ('$date',$user_id,$part_time,$id_class_room)";
    if ($database->execQuery($sql)) {
        echo 'ordered';
    } else {
        echo 'error';
    };
}