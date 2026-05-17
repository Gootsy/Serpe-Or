<?php 
require_once __DIR__ . '/includes/init.php'; 
require_once __DIR__ . '/includes/database.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $plante = getPlantById($id);
} else {
    die("ID not found");
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Serpe d'Or - Produit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/97e7d2c8b2.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <?php include_once(__DIR__ . '/includes/parts/menu.php') ?>

    <main id="produit-detail">
        <section class="detail-container">
            <div class="detail-gallery  carousel">
                <input type="radio" name="gallery" id="img1" checked>
                <input type="radio" name="gallery" id="img2">
                <input type="radio" name="gallery" id="img3">
                <input type="radio" name="gallery" id="img4">
                <input type="radio" name="gallery" id="img5">
                <div class="viewer">
                    <div class="container-img">
                        <img src="<?= vite_get_asset('produits/'.$plante['image_1']); ?>" alt="Image 1">
                    </div>
                    <div class="container-img">
                        <img src="<?= vite_get_asset('produits/'.$plante['image_2']); ?>" alt="Image 2">
                    </div>
                    <div class="container-img">
                        <img src="<?= vite_get_asset('produits/'.$plante['image_3']); ?>" alt="Image 3">
                    </div>
                    <div class="container-img">
                        <img src="<?= vite_get_asset('produits/'.$plante['image_4']); ?>" alt="Image 4">
                    </div>
                    <div class="container-img">
                        <img src="<?= vite_get_asset('produits/'.$plante['image_5']); ?>" alt="Image 5">
                    </div>
                </div>
                <div class="controls">
                    <ul class="slides">
                        <li class="slide-img"><label for="img1"><img src="<?= vite_get_asset('produits/'.$plante['image_1']); ?>" alt=""></label></li>
                        <li class="slide-img"><label for="img2"><img src="<?= vite_get_asset('produits/'.$plante['image_2']); ?>" alt=""></label></li>
                        <li class="slide-img"><label for="img3"><img src="<?= vite_get_asset('produits/'.$plante['image_3']); ?>" alt=""></label></li>
                        <li class="slide-img"><label for="img4"><img src="<?= vite_get_asset('produits/'.$plante['image_4']); ?>" alt=""></label></li>
                        <li class="slide-img"><label for="img5"><img src="<?= vite_get_asset('produits/'.$plante['image_5']); ?>" alt=""></label></li>
                    </ul>
                </div>

                <div class="actions">
                    <button type="button" class="previous" aria-label="Previous slide">
                    <
                    </button>
                    <button type="button" class="forwards" aria-label="Next slide">
                    >
                    </button>
                </div>
            </div>
            <article class="detail-article">
                <h3><?= $plante['name'] ?></h3>
                <h4><?= $plante['latin'] ?></h4>
                <p><?= $plante['description'] ?></p>
                <div class="article-icons">
                    <div class="icon">
                        <i class="fa-solid fa-ruler-vertical"></i>
                        <p class="icon-title">Hauteur de pot</p>
                        <p><?= $plante['heigth'] ?>cm</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-ruler-horizontal"></i>
                        <p class="icon-title">Largeur de pot</p>
                        <p><?= $plante['width'] ?>cm</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-cloud-sun"></i>
                        <p class="icon-title">Exposition</p>
                        <p><?= $plante['exposition'] ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-hand-holding-heart"></i>
                        <p class="icon-title">Entretien</p>
                        <p><?= $plante['care'] ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-droplet"></i>
                        <p class="icon-title">Humidité</p>
                        <p><?= $plante['humidity'] ?>%</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-shower"></i>
                        <p class="icon-title">Arrosage</p>
                        <p><?= $plante['water'] ?></p>
                    </div>
                </div>
                <div class="order">
                    <form action="" method="post">
                        <p class="price"><?= $plante['price'] ?>€</p>
                        <div class="order-detail">
                            <?php if($plante['stock']>=6): ?>
                                <div class="round green"></div>
                                <p>Disponible au magazin</p>
                            <?php elseif($plante['stock'] > 0 && $plante['stock'] <= 5): ?>
                                <div class="round orange"></div>
                                <p>Plus que <?= $plante['stock'] ?> en magasin</p>
                            <?php else: ?>
                                <div class="round red"></div>
                                <p>Rupture de stock</p>
                            <?php endif; ?>
                        </div>
                        <div class="order-detail">
                            <p>Quantité:</p>
                            <button class="qty-count qty-count--minus" commandfor="qty" command="--decrement" type="button">-</button>
                            <input class="product-qty" type="number" id="qty" name="quantity" min="1" max="10" step="1" value="1">
                            <button class="qty-count qty-count--add" commandfor="qty" command="--increment" type="button">+</button>
                        </div>
                        <div class="order-btn">
                            <input type="submit" value="Ajouter au panier">
                        </div>
                    </form>
                </div>
            </article>
        </section>
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
    <?php include_once(__DIR__ . '../includes/parts/footer.php'); ?>
    <?php echo vite_get_scripts('main.js'); ?>
</body>

</html>