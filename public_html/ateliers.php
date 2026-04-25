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
            <main class="ateliers">
                <section class="intro">
                    <h3>Bienvenue à nos ateliers!</h3>
                    <p>Nous vous accueillons dans nos ateliers-serres à nos divers ateliers pour un moment amical et instructif. Les places sont limitées pour vous apporter la meilleure attention à toutes vous questions, alors n’hésitez pas trop longtemps ;).</p>
                </section>
                <section class="atelier-container">
                    <article class="atelier">
                            <img src="<?= vite_get_asset('ateliers/terrarium-demo.jpg'); ?>" alt="">
                            <div class="atelier-txt">
                                <h3>Titre</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam, eum nihil, nesciunt vitae harum dicta dolores quos sapiente facere ullam rerum distinctio, esse optio doloremque! Omnis corporis repudiandae deleniti sint.</p>
                                <div class="atelier-infor">
                                    <div class="infor">
                                        <p><i class="fa-solid fa-chair"></i>Places restantes: <span>8</span></p>
                                        <p><i class="fa-regular fa-calendar-days"></i>Dates: <span>01-01-27</span></p>
                                        <p><i class="fa-regular fa-clock"></i>Horaires: <span>14h30</span></p>
                                        <p><i class="fa-solid fa-ticket"></i>Prix: <span>25€</span></p>
                                    </div>
                                    <div class="infor-btn">
                                        <a href="atelier-detail.php">Réservez maintenant</a>
                                    </div>
                                </div>
                            </div>
                    </article>
                    <article class="atelier">
                            <img src="<?= vite_get_asset('ateliers/sean-foster-drstUK2WG3Q-unsplash.jpg'); ?>" alt="">
                            <div class="atelier-txt">
                                <h3>Titre</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam, eum nihil, nesciunt vitae harum dicta dolores quos sapiente facere ullam rerum distinctio, esse optio doloremque! Omnis corporis repudiandae deleniti sint.</p>
                                <div class="atelier-infor">
                                    <div class="infor">
                                        <p><i class="fa-solid fa-chair"></i>Places restantes: <span>8</span></p>
                                        <p><i class="fa-regular fa-calendar-days"></i>Dates: <span>01-01-27</span></p>
                                        <p><i class="fa-regular fa-clock"></i>Horaires: <span>14h30</span></p>
                                        <p><i class="fa-solid fa-ticket"></i>Prix: <span>25€</span></p>
                                    </div>
                                    <div class="infor-btn">
                                        <a href="atelier-detail.php">Réservez maintenant</a>
                                    </div>
                                </div>
                            </div>
                    </article>
                    <article class="atelier">
                            <img src="<?= vite_get_asset('ateliers/sean-foster-drstUK2WG3Q-unsplash.jpg'); ?>" alt="">
                            <div class="atelier-txt">
                                <h3>Titre</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam, eum nihil, nesciunt vitae harum dicta dolores quos sapiente facere ullam rerum distinctio, esse optio doloremque! Omnis corporis repudiandae deleniti sint.</p>
                                <div class="atelier-infor">
                                    <div class="infor">
                                        <p><i class="fa-solid fa-chair"></i>Places restantes: <span>8</span></p>
                                        <p><i class="fa-regular fa-calendar-days"></i>Dates: <span>01-01-27</span></p>
                                        <p><i class="fa-regular fa-clock"></i>Horaires: <span>14h30</span></p>
                                        <p><i class="fa-solid fa-ticket"></i>Prix: <span>25€</span></p>
                                    </div>
                                    <div class="infor-btn">
                                        <a href="atelier-detail.php">Réservez maintenant</a>
                                    </div>
                                </div>
                            </div>
                    </article>
                    <article class="atelier">
                            <img src="<?= vite_get_asset('ateliers/terrarium-demo.jpg'); ?>" alt="">
                            <div class="atelier-txt">
                                <h3>Titre</h3>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam, eum nihil, nesciunt vitae harum dicta dolores quos sapiente facere ullam rerum distinctio, esse optio doloremque! Omnis corporis repudiandae deleniti sint.</p>
                                <div class="atelier-infor">
                                    <div class="infor">
                                        <p><i class="fa-solid fa-chair"></i>Places restantes: <span>8</span></p>
                                        <p><i class="fa-regular fa-calendar-days"></i>Dates: <span>01-01-27</span></p>
                                        <p><i class="fa-regular fa-clock"></i>Horaires: <span>14h30</span></p>
                                        <p><i class="fa-solid fa-ticket"></i>Prix: <span>25€</span></p>
                                    </div>
                                    <div class="infor-btn">
                                        <a href="atelier-detail.php">Réservez maintenant</a>
                                    </div>
                                </div>
                            </div>
                    </article>
                </section>
            </main>
        <?php include_once(__DIR__.'../includes/parts/footer.php'); ?>
    </body>
</html>