<?php
require_once('../../../class/Database.class.php');
$database = new Database();

$login = (isset($_POST['login'])) ? $_POST['login'] : '';
$pass = (isset($_POST['password'])) ? $_POST['password'] : '';

$sql = "SELECT users.PASSWORD as PASSWORD, 
               users.FIRST_NAME as FIRST_NAME,
               users.LAST_NAME as LAST_NAME,
               users.ID as USER_ID 
            FROM users WHERE users.LOGIN = '$login'";

$res = $database->getDataFromDb($sql);
$row = $res->fetch_assoc();

if ($row['PASSWORD'] == $pass) {
    session_start();
    $_SESSION['name'] = $login;
    $_SESSION['first_name'] = $row['FIRST_NAME'];
    $_SESSION['last_name'] = $row['LAST_NAME'];
    $_SESSION['user_id'] = $row['USER_ID'];
}
header('Location: ../../../');