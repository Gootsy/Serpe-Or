<?php require_once __DIR__ . '/includes/init.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Serpe d'Or - Commande en cours</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/97e7d2c8b2.js" crossorigin="anonymous"></script>
    <?php echo vite_get_scripts('main.js'); ?>
</head>

<body>
    <?php include_once(__DIR__ . '/includes/parts/menu.php') ?>
    <main class="order">
        <h2>Votre commande</h2>
        <section class="order-container">
            <div class="order-profil">
                <div class="fond-img-right">
                    <img src="<?php echo vite_get_asset('content/plante.png'); ?>" alt="">
                </div>
                <div class="coordonnee">
                    <form action="" method="post">
                        <h3>Vos coordonnées</h3>
                        <input type="text" name="name" id="nom" placeholder="Nom">
                        <input type="text" name="surname" id="prenom" placeholder="Prénom">
                        <input type="text" name="street" id="rue" placeholder="Rue">
                        <input type="number" name="street_number" id="rueNbre" placeholder="N°">
                        <input type="text" name="accommodation" id="accommodation" placeholder="Appartement, étage...">
                        <input type="number" name="zip" id="zip" placeholder="Code postal">
                        <input type="text" name="locality" id="localite" placeholder="Localité">
                        <input type="text" name="country" id="pays" placeholder="Pays">
                        <input type="email" name="email" id="email" placeholder="Email">
                        <input type="tel" name="telephone" id="telephone" placeholder="Téléphone">
                    </form>
                </div>
            </div>
            <div class="order-prods">
                <time datetime="01-01-2026">01-01-2026</time>
                <div class="order-prod">
                    <div class="order-img">
                        <img src="<?php echo vite_get_asset('produits/feey-bwsTJMnhcwE-unsplash.jpg'); ?>" alt="">
                    </div>
                    <div class="order-txt">
                        <h3>Monstera</h3>
                        <p class="price">35€ <small>(à l'unité)</small></p>
                        <p>Quantité: 1</p>
                    </div>
                    <a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
                <table>
                    <tr>
                        <td>Sous-total</td>
                        <td>35€</td>
                    </tr>
                    <tr>
                        <td>Transport</td>
                        <td>10€</td>
                    </tr>
                    <tr>
                        <td>Taxe</td>
                        <td>6,35€</td>
                    </tr>
                    <tr class="ttc">
                        <td>Total</td>
                        <td>51,35€</td>
                    </tr>
                </table>
                <div class="order-btn">
                    <a href="#" class="payer">Payer</a>
                </div>
            </div>
        </section>
    </main>
    <?php include_once(__DIR__ . '../includes/parts/footer.php'); ?>
</body>

</html>