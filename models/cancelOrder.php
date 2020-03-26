<?php
//Відміна резервування
require_once('../class/Database.class.php');
$database = new Database();

$date = Date('Y-m-d');
$part_time = $_POST['part_time'];
$id_class_room = $_POST['id_class_room'];

$sql = "DELETE FROM reserve WHERE PART_TIME = $part_time AND CLASS_ROOM_ID = $id_class_room
              AND DATE = '$date'";

$database->execQuery($sql);

echo 'canceled';