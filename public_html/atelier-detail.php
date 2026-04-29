<?php require_once __DIR__ . '/includes/init.php'; ?>
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
                    <input type="radio" name="gallery" id="img4">
                    <input type="radio" name="gallery" id="img5">
                    <div class="viewer">
                        <div class="container-img">
                        <img src="<?= vite_get_asset('ateliers/terrarium-demo.jpg'); ?>" alt="Image 1">
                        </div>
                        <div class="container-img">
                        <img src="<?= vite_get_asset('ateliers/sean-foster-drstUK2WG3Q-unsplash.jpg'); ?>" alt="Image 2">
                        </div>
                        <div class="container-img">
                        <img src="<?= vite_get_asset('ateliers/terrarium-demo.jpg'); ?>" alt="Image 3">
                        </div>
                        <div class="container-img">
                        <img src="<?= vite_get_asset('ateliers/terrarium-demo.jpg'); ?>" alt="Image 4">
                        </div>
                        <div class="container-img">
                        <img src="<?= vite_get_asset('ateliers/terrarium-demo.jpg'); ?>" alt="Image 5">
                        </div>
                    </div>
                    <div class="controls" tabindex="0">
                        <ul class="slides">
                            <li class="slide-img"><label for="img1"><img src="<?= vite_get_asset('ateliers/terrarium-demo.jpg'); ?>" alt=""></label></li>
                            <li class="slide-img"><label for="img2"><img src="<?= vite_get_asset('ateliers/sean-foster-drstUK2WG3Q-unsplash.jpg'); ?>" alt=""></label></li>
                            <li class="slide-img"><label for="img3"><img src="<?= vite_get_asset('ateliers/terrarium-demo.jpg'); ?>" alt=""></label></li>
                            <li class="slide-img"><label for="img4"><img src="<?= vite_get_asset('ateliers/terrarium-demo.jpg'); ?>" alt=""></label></li>
                            <li class="slide-img"><label for="img5"><img src="<?= vite_get_asset('ateliers/terrarium-demo.jpg'); ?>" alt=""></label></li>
                        </ul>
                        <div class="actions">
                            <button type="button" class="previous" aria-label="Previous slide">
                            <
                            </button>
                            <button type="button" class="forwards" aria-label="Next slide">
                            >
                            </button>
                        </div>
                        </div>
                    
                </div>
                <article class="detail-article">
                    <h3>Monstera</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos veritatis totam tempore inventore debitis mollitia accusantium animi deleniti ipsum nemo velit possimus rem a natus, culpa in. Dignissimos, eveniet iure! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam iste aperiam porro possimus, tenetur mollitia asperiores! Illo quae deleniti rem, odit eveniet cum obcaecati ducimus eaque error, dolores hic alias.</p>
                    <h4>Informations supplémentaires</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos veritatis totam tempore inventore debitis mollitia accusantium animi deleniti ipsum nemo velit possimus rem a natus, culpa in. Dignissimos, eveniet iure! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam iste aperiam porro possimus, tenetur mollitia asperiores! Illo quae deleniti rem, odit eveniet cum obcaecati ducimus eaque error, dolores hic alias.</p>
                    
                    <div class="order">
                        <form action="" method="post">
                            <p class="price">25€</p>
                            <div class="atelier-detail">
                                <div class="order-detail">
                                    <p>Places restantes: <span>8</span></p>
                                    <p>Dates: <span>01-01-27</span></p>
                                    <p>Horaires: <span>14h30</span></p>
                                    <p>Prix: <span>25€</span></p>
                                </div>
                                <div class="order-detail">
                                    <p>Quantité:</p>
                                    <div>
                                        <button class="qty-count qty-count--minus" commandfor="qty" command="--decrement" type="button">-</button>
                                        <input class="product-qty" type="number" id="qty" name="quantity" min="1" max="10" step="1" value="1">
                                        <button class="qty-count qty-count--add" commandfor="qty" command="--increment" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="order-btn">
                                <input type="submit" value="Ajouter au panier">
                            </div>
                        </form>
                    </div>
                </article>
            </section>
        </main>

        <?php include_once(__DIR__.'../includes/parts/footer.php'); ?>
    </body>
</html>