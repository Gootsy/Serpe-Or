<?php 
require_once __DIR__ . '/includes/init.php'; 
require_once __DIR__ . '/includes/database.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $atelier=getAtelierById($id);
} else {
    die("ID not found");
}

?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>La Serpe d'Or - Atelier</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/97e7d2c8b2.js" crossorigin="anonymous"></script>
        <?php echo vite_get_scripts('main.js'); ?>
    </head>

    <body>
        <?php include_once(__DIR__.'/includes/parts/menu.php') ?>

        <main id="atelier-detail">
            <section class="detail-container  carousel">
                <div class="detail-gallery">
                    <input type="radio" name="gallery" id="img1" checked>
                    <input type="radio" name="gallery" id="img2">
                    <input type="radio" name="gallery" id="img3">
                    <div class="viewer">
                        <div class="container-img">
                        <img src="<?= vite_get_asset('ateliers/' . $atelier['image_atelier_1']); ?>" alt="Image 1">
                        </div>
                        <div class="container-img">
                        <img src="<?= vite_get_asset('ateliers/' . $atelier['image_atelier_2']); ?>" alt="Image 2">
                        </div>
                        <div class="container-img">
                        <img src="<?= vite_get_asset('ateliers/' . $atelier['image_atelier_3']); ?>" alt="Image 3">
                        </div>
                    </div>
                    <div class="controls" tabindex="0">
                        <ul class="slides">
                            <li class="slide-img"><label for="img1"><img src="<?= vite_get_asset('ateliers/' . $atelier['image_atelier_1']); ?>" alt=""></label></li>
                            <li class="slide-img"><label for="img2"><img src="<?= vite_get_asset('ateliers/' . $atelier['image_atelier_2']); ?>" alt=""></label></li>
                            <li class="slide-img"><label for="img3"><img src="<?= vite_get_asset('ateliers/' . $atelier['image_atelier_3']); ?>" alt=""></label></li>
                        </ul>
                    </div>
                    
                </div>
                <article class="detail-article">
                    <h3><?= htmlspecialchars($atelier['name_atelier']); ?></h3>
                    <p><?= htmlspecialchars($atelier['intro']); ?></p>
                    <h4>Informations supplémentaires</h4>
                    <p><?= htmlspecialchars($atelier['description_atelier']); ?></p>
                    
                    <div class="order">
                        <form action="" method="post">
                            <p class="price">25€</p>
                            <div class="atelier-detail">
                                <div class="order-detail">
                                    <p>Places restantes: <span><?= number_format($atelier['group']); ?></span></p>
                                    <p>Dates: <span><?= date('d-m-Y', strtotime($atelier['date_atelier'])); ?></span></p>
                                    <p>Horaires: <span><?= date('H:i', strtotime($atelier['hour'])); ?></span></p>
                                    <p>Prix: <span><?= number_format($atelier['price_atelier'], 2, ',',''); ?>€</span></p>
                                </div>
                                <?php if($atelier['group']>=1): ?>
                                <div class="order-detail">
                                    <p>Quantité:</p>
                                    <div>
                                        <button class="qty-count qty-count--minus" commandfor="qty" command="--decrement" type="button">-</button>
                                        <input class="product-qty" type="number" id="qty" name="quantity" min="1" max="10" step="1" value="1">
                                        <button class="qty-count qty-count--add" commandfor="qty" command="--increment" type="button">+</button>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php if($atelier['group']>=1): ?>
                            <div class="order-btn">
                                <input type="submit" value="Ajouter au panier">
                            </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </article>
            </section>
        </main>

        <?php include_once(__DIR__.'../includes/parts/footer.php'); ?>
    </body>
</html>