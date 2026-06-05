<?php
session_start();
require_once __DIR__ . '/includes/init.php';
require_once __DIR__ . '/includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantity'])) {

    foreach ($_POST['quantity'] as $id => $quantity) {

        $quantity = max(1, (int)$quantity);

        if (isset($_SESSION['cart']['plante'][$id])) {
            $_SESSION['cart']['plante'][$id] = $quantity;
        }

        if (isset($_SESSION['cart']['accessoire'][$id])) {
            $_SESSION['cart']['accessoire'][$id] = $quantity;
        }
    }

    header('Location: panier.php');
    exit;
}

$cart = $_SESSION['cart'] ?? [];
$cartItems = getCartItems($pdo, $cart);
$sousTotal = calculateCartTotal($cartItems);
$transport = 10;
$total = $sousTotal + $transport;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Serpe d'Or - Panier</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/97e7d2c8b2.js" crossorigin="anonymous"></script>
    <?php echo vite_get_scripts('main.js'); ?>
</head>

<body>
    <?php include_once(__DIR__ . '/includes/parts/menu.php') ?>
    <main class="panier">
        <form action="" method="post">
            <h2>Votre panier</h2>
            <div class="modal">
                <p>Si vous décidez de changer les quantités sur cette page, veuiller garder à jour en cliquant sous 'Total TTC' avant de quitter la page afin d'enregistrer les nouvelles quantités!</p>
                <a href="#" class="modal-update">Garder à jour</a>
            </div>
            <section class="container-paniers">
                <div class="panier-container">
                    <?php 
                    if (empty($cart['plante']) && empty($cart['accessoire'])):?>
                        <p class="vide">Panier est vide pour l'instant</p>
                    <?php else :
                        foreach ($cartItems as $cartItem) {
                            $id = $cartItem['id'];
                            $product = $cartItem['product'];
                            $quantity = $cartItem['quantity'];
                            $lineTotal = $cartItem['line_total'];
                            $type = $cartItem['type'];
                    ?>
                            <div class="panier-produits">
                                <div class="panier-img">
                                    <img src="<?php echo vite_get_asset( $type . 's/' . $product['image_1']); ?>" alt="">
                                </div>
                                <div class="panier-descrip">
                                    <h3><?= htmlspecialchars($product['name']); ?></h3>
                                    <p class="price"><small><span class="prix-uniq"><?= number_format($product['price'], 2, ',', ''); ?></span>€ (à l'unité)</small></p>
                                    <div class="order-detail">
                                        <p>Quantité:</p>
                                        <div class="quantite">
                                            <button class="qty-count qty-count--minus" commandfor="qty-<?= $id ?>" command="--decrement" type="button">-</button>
                                            <input class="product-qty" type="number" id="qty-<?= $id ?>" name="quantity[<?= $id ?>]" min="1" max="10" step="1" value="<?= $quantity ?>">
                                            <button class="qty-count qty-count--add" commandfor="qty-<?= $id ?>" command="--increment" type="button">+</button>
                                        </div>
                                    </div>
                                    <p class="price">Total: <span class="prix-qty"><?= number_format($lineTotal, 2, ',', ''); ?></span>€</p>
                                </div>
                                <div class="panier-delete">
                                    <a href="./remove-cart.php?type=<?= $type; ?>&id=<?= $id ?>" onclick="return confirm('Supprimer du panier ?')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </div>
                
            <?php }; ?>
                </div>
            <div class="panier-total">
                <table class="total">
                    <tr>
                        <td>Sous-total</td>
                        <td id="sousTotal"><?= number_format($sousTotal, 2, ',', ' '); ?>€</td>
                    </tr>
                    <tr>
                        <td>Transport</td>
                        <td id="transport"><?= number_format($transport, 2, ',', ' '); ?>€</td>
                    </tr>
                    <tr class="ttc">
                        <td>Total TTC</td>
                        <td id="ttc"><?= number_format($total, 2, ',', ' '); ?>€</td>
                    </tr>
                </table>
                <div class="panier-order-btn">
                    <a href="#" class="invite">Commander en tant qu'invité</a>
                    <a href="#" class="connecte">Commander</a>
                </div>
            </div>
            </section>
        <?php endif; ?>
        </form>
        <?php if (!empty($cart['plante']) || !empty($cart['accessoire'])): ?>
        <section class="recommandation">
            <h3>Ce que nous vous recommandons avec ce produit:</h3>
            <div class="container-card">
                <?php
                $error = false;
                if ($error === true){
                ?>
                <div class="error">
                    <p>Veuillez nous excuser. Nos produits sont momentanément invalides...</p>
                </div>
                
                <?php
                }else{  

                    if($cartItems[0]['type'] == 'plante'){
                        $recommandationIds=[$cartItems[0]['product']['fk_id_accessoire_1'],$cartItems[0]['product']['fk_id_accessoire_2'],$cartItems[0]['product']['fk_id_accessoire_3']];
                        $recommandations= getPlantAccessoires($recommandationIds);
                        foreach($recommandations as $item){
                            include(__DIR__.'../includes/parts/carte-acces.php');
                        }
                    }
                    elseif($cartItems[0]['type'] == 'accessoire'){
                        $id_categorie_principale = $cartItems[0]['product']['id_acces_categorie'];
                        $news=getNewAccessoires($id_categorie_principale, $id);
                        foreach($news as $item){
                        include(__DIR__.'../includes/parts/carte-acces.php');
                        }
                    }
                }
                ?>
            </div>
        </section>
        <?php endif; ?>
    </main>
    <?php include_once(__DIR__ . '../includes/parts/footer.php') ?>
</body>

</html>