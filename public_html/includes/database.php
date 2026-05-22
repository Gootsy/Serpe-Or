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
            -- INNER JOIN accessoires a ON id_accessoire = fk_id_accessoire_1
            WHERE p.id_plantes=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([(int)$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getAccessoires(){
    global $pdo;

    $sql = "SELECT *
            FROM accessoires a
            ORDER BY a.id_accessoires DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
};

function getAccessoireById($id){
    global $pdo;
    $sql = "SELECT *
            FROM accessoires a
            WHERE a.id_accessoires=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([(int)$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
}