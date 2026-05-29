<?php
session_start();

$type =$_GET['type'];
$id = $_GET['id'];

unset($_SESSION['cart'][$type][$id]);

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;