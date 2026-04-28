<?php require_once __DIR__ . '/includes/init.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Serpe d'Or</title>
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
            <section class="panier-container">
                <div class="panier-produits">
                    <div class="panier-img">
                        <img src="<?php echo vite_get_asset('produits/feey-bwsTJMnhcwE-unsplash.jpg'); ?>" alt="">
                    </div>
                    <div class="panier-descrip">
                        <h3>Monstera</h3>
                        <p class="price">35€ <small>(à l'unité)</small></p>
                        <div class="order-detail">
                            <p>Quantité:</p>
                            <div class="quantite">
                                <button class="qty-count qty-count--minus" commandfor="qty" command="--decrement" type="button">-</button>
                                <input class="product-qty" type="number" id="qty" name="quantity" min="1" max="10" step="1" value="1">
                                <button class="qty-count qty-count--add" commandfor="qty" command="--increment" type="button">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="panier-delete">
                        <a href="#"><i class="fa-solid fa-trash-can"></i></a>
                    </div>
                </div>
                <div class="panier-total">
                    <table class="total">
                        <tr>
                            <td>Sous-total</td>
                            <td>35€</td>
                        </tr>
                        <tr>
                            <td>Transport</td>
                            <td>10€</td>
                        </tr>
                        <tr>
                            <td>Taxes</td>
                            <td>6,35€</td>
                        </tr>
                        <tr class="ttc">
                            <td>Total TTC</td>
                            <td>51,35€</td>
                        </tr>
                    </table>
                    <div class="panier-order-btn">
                        <a href="#" class="invite">Commander en tant qu'invité</a>
                        <a href="#" class="connecte">Commander</a>
                    </div>
                </div>
            </section>
        </form>
        <section class="recommandation">
            <h3>Ce que nous vous recommandons avec ce produit:</h3>
            <div class="container-card">
                <?php for ($i = 0; $i < 3; $i++) {
                    include(__DIR__ . '../includes/parts/carte.php');
                }
                ?>
            </div>
        </section>
    </main>
    <?php include_once(__DIR__ . '../includes/parts/footer.php') ?>
</body>

</html>