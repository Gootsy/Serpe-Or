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
        <?php include_once(__DIR__.'/includes/parts/menu.php') ?>
        <main id="home">
            <section class="banner">
                <img src="<?php echo vite_get_asset('content/PXL_20240725_112058790.jpg'); ?>" alt="Entrée de la serre">
                <h1>La Serpe d'Or</br>La nature à votre porté</h1>
                <div class="aside">
                    <p>Venez découvrir</br>nos ateliers</br>pour mieux</br>connaître vos</br>plantes adorées!</p>
                    <img src="<?php echo vite_get_asset('content/terrarium-demo.jpg'); ?>" alt="atelier terrarium">
                    <a class="button" href="ateliers.php">Plus d'information<i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </section>

            <section class="histoire">
                <div class="histoire-img">
                    <img src="<?php echo vite_get_asset('produits/Thym-Copyright-natalia-bulatova-shutterstock.webp'); ?>" alt="Image d'histoire de plantes">
                </div>
                <div class="histoire-txt">
                    <div>
                        <h2>Histoire de plantes:</h2>
                        <h3>Thym</h3>
                        <p>Le nom de « Thym » est la francisation de Thymus qui désignait en latin plusieurs Lamiacées aromatiques de petite taille, lui-même issu du grec θύμον / thúmon, « thym ». Le nom provient de l'égyptien tham (nom d'une plante servant à embaumer les corps) ou de la racine grecque thy, signifiant « exhaler une odeur ». </p>
                    </div>
                    <div>
                        <a class="button" href="#">Plus d'information<i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
                <div class="fond-img-right">
                    <img src="<?php echo vite_get_asset('content/feuille-de-monstera.png'); ?>" alt="">
                </div>
            </section>

            <section class="categorie">
                <div class="categorie-box">
                    <div class="slide-container">
                        <div class="slide" id="inside">
                            <img src="<?php echo vite_get_asset('content/luisa-brimble-1KYprL0KevE-unsplash.jpg'); ?>" alt="Intérieur">
                            <div class="category-overlay">
                                <a href="#">Intérieur</a>
                            </div>
                        </div>
                        <div class="slide" id="outside">
                            <img src="<?php echo vite_get_asset('content/robin-wersich-Q0IrpWQIMR4-unsplash.jpg'); ?>" alt="Extérieur">
                            <div class="category-overlay">
                                <a href="#">Extérieur</a>
                            </div>
                        </div>
                        <div class="slide" id="terra">
                            <img src="<?php echo vite_get_asset('content/terrarium-demo.jpg'); ?>" alt="Terrarium">
                            <div class="category-overlay">
                                <a href="#">Terrarium</a>
                            </div>
                        </div>
                        <div class="slide" id="arom">
                            <img src="<?php echo vite_get_asset('content/elias-morr-dyQuGkZMLkk-unsplash.jpg'); ?>" alt="Plantes aromatiques">
                            <div class="category-overlay">
                                <a href="#">Plantes aromatiques</a>
                            </div>
                        </div>
                        <div class="slide" id="tool">
                            <img src="<?php echo vite_get_asset('content/kaufmann-mercantile-a7Woj8W6J0s-unsplash.jpg'); ?>" alt="Accessoires">
                            <div class="category-overlay">
                                <a href="accessoires.php">Accessoires</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination">
                    <div class="pagination-bullet">
                        <!-- si on survole une zone, le bullet approprié devient celui actif.
                            si on clique sur le bullet la zone apparait -->
                    </div>
                    <div class="pagination-bullet">
                    </div>
                    <div class="pagination-bullet">
                    </div>
                    <div class="pagination-bullet">
                    </div>
                    <div class="pagination-bullet">
                    </div>
                </div>
            </section>
            <div class="fond-img-left">
                <img src="<?php echo vite_get_asset('content/feuille.png'); ?>" alt="">
            </div>
            <section class="new">
                <h2>Arrivages</h2>
                <div class="container-card">
                    <?php for ($i=0;$i<3;$i++){
                        include(__DIR__.'../includes/parts/carte.php');
                    }
                    ?>
                    
                </div>
                <div class="suite">
                    <a class="button" href="produit.php">Plus de plantes  <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
                <div class="fond-img-right">
                    <img src="<?php echo vite_get_asset('content/plante(1).png'); ?>" alt="">
                </div>
            </section>

            <section class="action-atelier">
                <div class="suite">
                    <a class="button" href="ateliers.php">Nos ateliers  <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </section>

            <section class="garantie">
                <div class="serre">
                    <img src="<?php echo vite_get_asset('icons/serre.png'); ?>" alt="picto de serre">
                    <p>Fraichement livrer de nos serres.</p>
                </div>
                <div class="experience">
                    <img src="<?php echo vite_get_asset('icons/experience.png'); ?>" alt="Picto experience">
                    <p>Expertise botanique certifiée et avec 2 générations de savoir à votre service.</p>
                </div>
                <div class="variete">
                    <img src="<?php echo vite_get_asset('icons/variete.png'); ?>" alt="Picto de variéte de plante">
                    <p>Une variété de sélection soignée au petit oignon.</p>
                </div>
            </section>

            <section class="newsletter">
                <div>
                    <label for="newsletter" >Recevez notre <span>Newsletter</span> pour être les premiers à connaître nos arrivages ainsi que nos ateliers.</label>
                    <input type="email" name="newsletter" placeholder=" email" id="newsletter">
                    <button type="submit" class="submit"><i class="fa-solid fa-angle-right"></i></button>
                </div>
            </section>
        </main>
        <?php include_once(__DIR__.'../includes/parts/footer.php') ?>
    </body>
</html>