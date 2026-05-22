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
            WHERE p.id_plantes=? ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([(int)$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getPlantAccessoires($ids){
    global $pdo;
    $accessoires = implode(',', array_fill(0, count($ids), '?'));
    $sql = "SELECT *
            FROM accessoires a
            WHERE a.id_accessoires IN ($accessoires)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($ids);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

function getNewAccessoires($id_categorie_principale,$id){
    global $pdo;

    $sql = "SELECT *
            FROM accessoires a
            WHERE id_acces_categorie = ? AND id_accessoires != ?
            ORDER BY a.id_accessoires DESC
            LIMIT 3";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute([$id_categorie_principale, $id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
};