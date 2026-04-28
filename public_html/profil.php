<?php require_once __DIR__ . '/includes/init.php'; ?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>La Serpe d'Or - Profil</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/97e7d2c8b2.js" crossorigin="anonymous"></script>
        <?php echo vite_get_scripts('main.js'); ?>
    </head>

    <body>
        <?php include_once(__DIR__.'/includes/parts/menu.php') ?>
        <main id="profil">
            <section class="profil-coordonnee">
                <div class="profil-img">
                    <img src="<?= vite_get_asset('content/claudia-pop-ik1eGAJ5qio-unsplash.jpg'); ?>" alt="">
                </div>
                <div class="profil-adresse">
                    <h3>Nom Prénom</h3>
                    <p>Rue Lorem 55,</br>4321 Ipsum Belgique</p>
                    <p>+32401234567</p>
                    <p>nom.prenom@mail.be</p>
                </div>
                <div class="fond-img-right">
                    <img src="<?php echo vite_get_asset('content/plante.png'); ?>" alt="">
                </div>
                <a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
            </section>
            <section class="profil-commande">
                <h2>Vos commandes</h2>
                <div class="recap-commande">
                    <time datetime="01-01-2026">01-01-2026</time>
                    <div class="recap-prods">
                        <div class="recap-prod">
                            <div class="recap-img">
                                <img src="<?php echo vite_get_asset('produits/feey-bwsTJMnhcwE-unsplash.jpg'); ?>" alt="">
                            </div>
                            <div class="recap-txt">
                                <h3>Monstera</h3>
                                <p class="price">35€ <small>(à l'unité)</small></p>
                                <p>Quantité: 1</p>
                            </div>
                        </div>
                        <div class="recap-total">
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
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include_once(__DIR__.'../includes/parts/footer.php'); ?>
    </body>
</html>