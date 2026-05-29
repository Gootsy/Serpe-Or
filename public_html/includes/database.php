<?php

require_once "config.php";

function getPlants(){
    global $pdo;
    $sql = "SELECT p.*, pc.name AS nom_categorie
            FROM plantes p
            JOIN plante_categories pc ON pc.id_plant_categorie = p.id_plant_categorie
            WHERE 1=1";
    $params = [];
    if(!empty($_GET['plante_categories']) && is_array($_GET['plante_categories'])){
        $categorie_filtrees = array_map('intval', $_GET['plante_categories']);
        $placeholders = implode(',', array_fill(0, count($categorie_filtrees), '?'));
        $sql .= " AND p.id_plant_categorie IN ($placeholders)";
        $params = array_merge($params, $categorie_filtrees);
    }
    if(!empty($_GET['care']) && is_array($_GET['care'])){
        $care_filtrees = array_map('strval', $_GET['care']);
        $placeholders = implode(',', array_fill(0, count($care_filtrees), '?'));
        $sql .= " AND p.care IN ($placeholders)";
        $params = array_merge($params, $care_filtrees);
    }
    if(!empty($_GET['exposition']) && is_array($_GET['exposition'])){
        $exposition_filtrees = array_map('strval', $_GET['exposition']);
        $placeholders = implode(',', array_fill(0, count($exposition_filtrees), '?'));
        $sql .= " AND p.exposition IN ($placeholders)";
        $params = array_merge($params, $exposition_filtrees);
    }
    if (!empty($_GET['taille']) && is_array($_GET['taille'])) {
        $conditions_taille = [];
        
        foreach ($_GET['taille'] as $taille) {
            if ($taille === 'petite') {
                $conditions_taille[] = "p.width BETWEEN ? AND ?";
                $params[] = 3;
                $params[] = 9;
            }
            elseif ($taille === 'moyenne') {
                $conditions_taille[] = "p.width BETWEEN ? AND ?";
                $params[] = 10;
                $params[] = 18;
            }
            elseif ($taille === 'grande') {
                $conditions_taille[] = "p.width >= ?";
                $params[] = 19;
            }
        }
        
        // Si l'utilisateur a coché une ou plusieurs cases, on les lie avec un OR
        // Exemple si "petite" et "moyenne" cochés : AND (width BETWEEN 3 AND 9 OR taille_pot BETWEEN 10 AND 18)
        if (!empty($conditions_taille)) {
            $sql .= " AND (" . implode(" OR ", $conditions_taille) . ")";
        }
    }
    if (!empty($_GET['search'])) {
        $search = '%' . trim($_GET['search']) . '%';
        $sql .= " AND (p.name LIKE ? OR p.description LIKE ?)";
        $params[] = $search;
        $params[] = $search;
    }
    $sql .= " ORDER BY p.id_plantes DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params); 
    return $stmt->fetchAll();
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
    $sql = "SELECT a.*, ac.name AS nom_categorie
            FROM accessoires a
            JOIN acces_categories ac ON ac.id_acces_categorie = a.id_acces_categorie
            WHERE 1=1";
    $params = [];
    if(!empty($_GET['acces_categories']) && is_array($_GET['acces_categories'])){
        $categorie_filtrees = array_map('intval', $_GET['acces_categories']);
        $placeholders = implode(',', array_fill(0, count($categorie_filtrees), '?'));
        $sql .= " AND a.id_acces_categorie IN ($placeholders)";
        $params = array_merge($params, $categorie_filtrees);
    }
    if (!empty($_GET['stock']) && is_array($_GET['stock'])) {
        if (in_array('dispo', $_GET['stock'])) {
            $sql .= " AND a.stock > ?";
            $params[] = 0;
        }
    }
    if (!empty($_GET['search'])) {
        $search = '%' . trim($_GET['search']) . '%';
        $sql .= " AND (a.name LIKE ? OR a.description LIKE ?)";
        $params[] = $search;
        $params[] = $search;
    }
    $sql .= " ORDER BY a.id_accessoires DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params); 
    return $stmt->fetchAll();
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

function getAteliers(){
    global $pdo;
    $sql = "SELECT*
            FROM ateliers ate
            ORDER BY ate.id_atelier DESC";
    $stmt =$pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAtelierById($id){
    global $pdo;
    $sql = "SELECT *
            FROM ateliers ate
            WHERE ate.id_atelier=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([(int)$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getCartItems($pdo, $cart){
    if (empty($cart)) {
            return [];
        }
    $items = [];
    if ($cart['plante']){
        $ids = array_keys($cart['plante']);
        
        $placeholders = implode(',', array_fill(0, count($ids), '?'));

        $sql = "SELECT * FROM plantes WHERE id_plantes IN ($placeholders)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($ids);

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($products as $product) {

            $id = $product['id_plantes'];
            $quantity = (int) $cart['plante'][$id];

            $lineTotal = $product['price'] * $quantity;

            $items[] = [
                'product' => $product,
                'quantity' => $quantity,
                'line_total' => $lineTotal,
                'type' => 'plante',
            ];
        };
    }

    return $items;
}

function calculateCartTotal(array $cartItems): float
{
    $total = 0;

    foreach ($cartItems as $item) {
        $total += $item['line_total'];
    }

    return $total;
}