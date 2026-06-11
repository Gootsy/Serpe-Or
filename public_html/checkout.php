<?php
session_start();
require_once "database.php";

$id = $_SESSION['loggedUser']['id_users'] ?? null;

if (!$id) {
    $_SESSION['pending_checkout'] = true;
    header("Location: inscription.php");
    exit;
}