<?php require_once __DIR__ . '/includes/init.php'; ?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>La Serpe d'Or - Produits</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/97e7d2c8b2.js" crossorigin="anonymous"></script>
        <?php echo vite_get_scripts('main.js'); ?>
    </head>

    <body>
        <?php include_once(__DIR__.'/includes/parts/menu.php') ?>

        <main id="produit-detail">
            <section class="detail-container">
                <div class="detail-gallery">
                    <input type="radio" name="gallery" id="img1" checked>
                    <input type="radio" name="gallery" id="img2">
                    <input type="radio" name="gallery" id="img3">
                    <div class="viewer">
                        <div class="container-img">
                        <img src="<?= vite_get_asset('produits/feey-bwsTJMnhcwE-unsplash.jpg'); ?>" alt="Image 1" class="slide">
                        </div>
                        <div class="container-img">
                        <img src="<?= vite_get_asset('produits/olena-bohovyk-TpALGJoHFP8-unsplash.jpg'); ?>" alt="Image 2" class="slide">
                        </div>
                        <div class="container-img">
                        <img src="<?= vite_get_asset('produits/feey-bwsTJMnhcwE-unsplash.jpg'); ?>" alt="Image 3" class="slide">
                        </div>
                    </div>
                    <div class="controls">
                        <label for="img1"><img src="<?= vite_get_asset('produits/feey-bwsTJMnhcwE-unsplash.jpg'); ?>" alt=""></label>
                        <label for="img2"><img src="<?= vite_get_asset('produits/olena-bohovyk-TpALGJoHFP8-unsplash.jpg'); ?>" alt=""></label>
                        <label for="img3"><img src="<?= vite_get_asset('produits/feey-bwsTJMnhcwE-unsplash.jpg'); ?>" alt=""></label>
                    </div>
                </div>
                <article class="detail-article">

                </article>
            </section>
        </main>

        <?php include_once(__DIR__.'../includes/parts/footer.php'); ?>
    <script src="assets/JS/script.js"></script>
    </body>
</html>