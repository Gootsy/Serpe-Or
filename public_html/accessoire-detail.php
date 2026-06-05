<?php
require_once __DIR__ . '/includes/init.php';
require_once __DIR__ . '/includes/database.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $accessoire = getAccessoireById($id);
} else {
    die("ID not found");
}
$id_categorie_principale = $accessoire['id_acces_categorie'];
$news=getNewAccessoires($id_categorie_principale, $id);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Serpe d'Or - <?= $accessoire['name'] ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/97e7d2c8b2.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php include_once(__DIR__ . '/includes/parts/menu.php') ?>

    <main id="atelier-detail">
        <section class="detail-container">
            <div class="detail-gallery  carousel">
                <input type="radio" name="gallery" id="img1" checked>
                <input type="radio" name="gallery" id="img2">
                <input type="radio" name="gallery" id="img3">
                <div class="viewer">
                    <?php if (!empty($accessoire['image_1'])): ?>
                        <div class="container-img">
                            <img src="<?= vite_get_asset('accessoires/' . $accessoire['image_1']); ?>" alt="Image 1">
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($accessoire['image_2'])): ?>
                        <div class="container-img">
                            <img src="<?= vite_get_asset('accessoires/' . $accessoire['image_2']); ?>" alt="Image 2">
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($accessoire['image_3'])): ?>
                        <div class="container-img">
                            <img src="<?= vite_get_asset('accessoires/' . $accessoire['image_3']); ?>" alt="Image 3">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="controls">
                    <ul class="slides">
                        <?php if (!empty($accessoire['image_1'])): ?>
                            <li class="slide-img"><label for="img1"><img src="<?= vite_get_asset('accessoires/' . $accessoire['image_1']); ?>" alt=""></label></li>
                        <?php endif; ?>
                        <?php if (!empty($accessoire['image_2'])): ?>
                            <li class="slide-img"><label for="img2"><img src="<?= vite_get_asset('accessoires/' . $accessoire['image_2']); ?>" alt=""></label></li>
                        <?php endif; ?>
                        <?php if (!empty($accessoire['image_3'])): ?>
                            <li class="slide-img"><label for="img3"><img src="<?= vite_get_asset('accessoires/' . $accessoire['image_3']); ?>" alt=""></label></li>
                        <?php endif; ?>
                    </ul>
                </div>

            </div>
            <article class="detail-article">
                <h3><?= $accessoire['name'] ?></h3>
                <p><?= $accessoire['description'] ?></p>
                <div class="order">
                    <form action="add-to-cart.php" method="post">
                        <input type="hidden" name="id_accessoires" value="<?= $accessoire['id_accessoires'] ?>">
                        <input type="hidden" name="produit_type" value="accessoire">
                        <p class="price"><?= $accessoire['price'] ?>€</p>
                        <div class="order-detail">
                            <?php if ($accessoire['stock'] >= 6): ?>
                                <div class="round green"></div>
                                <p>Disponible au magazin</p>
                            <?php elseif ($accessoire['stock'] > 0 && $accessoire['stock'] <= 5): ?>
                                <div class="round orange"></div>
                                <p>Plus que <?= $accessoire['stock'] ?> en magasin</p>
                            <?php else: ?>
                                <div class="round red"></div>
                                <p>Rupture de stock</p>
                            <?php endif; ?>
                        </div>
                        <?php if ($accessoire['stock'] >= 1): ?>
                        <div class="order-detail">
                            <p>Quantité:</p>
                            <button class="qty-count count-minus" type="button">-</button>
                            <input class="produit-count" type="number" id="qty" name="quantity" min="1" max="<?= $accessoire['stock'] ?>" step="1" value="1">
                            <button class="qty-count count-add" type="button">+</button>
                        </div>
                        <div class="order-btn">
                            <input type="submit" value="Ajouter au panier">
                        </div>
                        <?php endif; ?>
                    </form>
                </div>
            </article>
        </section>
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
                }
                else{
                    foreach($news as $item){
                        include(__DIR__.'../includes/parts/carte-acces.php');
                    }
                }
                ?>
            </div>
        </section>
    </main>
    <?php include_once(__DIR__ . '../includes/parts/footer.php'); ?>
    <?php echo vite_get_scripts('main.js'); ?>
</body>

</html>