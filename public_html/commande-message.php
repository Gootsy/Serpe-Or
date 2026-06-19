<?php
session_start();
require_once __DIR__ . '/includes/init.php';
require_once __DIR__ . '/includes/database.php';

$idUser = $_SESSION['logged_user']['id_users'] ?? null;
$orderId=$_GET['id'] ?? null;
if ($idUser) {
    $user = getUsersByID($idUser);

    if ($user) {
        $_SESSION['logged_user'] = [
            'email' => $user['email'],
            'id_users' => $user['id_users']
        ];
    } else {
        echo "Utilisateur introuvable";
    }
} elseif($orderId) {
    $req = $pdo->prepare("
    SELECT 
        users.name_user,
        users.surname,
        orders.id_orders,
        orders.total,
        orders.date_order,
        orders.status
    FROM orders
    JOIN users ON users.id_users = orders.id_users
    WHERE orders.id_orders = ?
    ");

    $req->execute([$orderId]);

    $order = $req->fetch();
}else{
    header('Location: index.php');
    exit;
}




?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Serpe d'Or - Message</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/97e7d2c8b2.js" crossorigin="anonymous"></script>
    <?php echo vite_get_scripts('main.js'); ?>
</head>

<body>
    <?php include_once(__DIR__ . '/includes/parts/menu.php') ?>
        <main class="message">
            <p><?php echo htmlspecialchars($order['surname']) . ' ' . htmlspecialchars($order['name_user']); ?></p>
            <p>Votre commande n°<?= $order['id_orders'] ?> a bien été reçue!</p>
            <div class="choix">
                <a class="button" href="index.php"><i class="fa-solid fa-arrow-left-long"></i> Retour à l'accueil</a>
                <?php if(!$orderId): ?>
                <a class="button" href="profil.php">Voir votre profil <i class="fa-solid fa-arrow-right-long"></i></a>
                <?php endif; ?>
            </div>
        </main>
    <?php include_once(__DIR__ . '../includes/parts/footer.php') ?>
</body>
</html>