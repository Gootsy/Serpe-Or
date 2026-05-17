<?php

require_once "config.php";

function getPlants(){
    global $pdo;

    $sql = "SELECT *
            FROM plantes p
            ORDER BY p.id_plantes DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
};

function getPlantById($id){
    global $pdo;
    $sql = "SELECT *
            FROM plantes p
            WHERE p.id_plantes=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([(int)$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
}