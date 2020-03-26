<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('class/View.class.php');
$view = new View();

if (isset($_SESSION['name'])) {
    $view->tableReservationsPage();
} else {
    if (isset($_GET['reg'])) {
        require_once ('modules/registrations/index.php');
    } else {
        require_once ('modules/authorization/index.php');
    }
}