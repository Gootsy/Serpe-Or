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
        <main id="produit">
            <aside>
                <div class="filtre">
                    <form action="produit.php" method="get">
                        <div class="line search">
                            <input type="search" name="search" id="search" placeholder="Recherche...">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div class="line dropdown">
                            <button type="button" class="dropbtn">Catégorie <i class="fa-solid fa-angle-down"></i></button>
                            <div class="dropdown-content">
                                <div class="checkbox">
                                    <input type="checkbox" name="categorie" id="inside">
                                    <label for="inside">Intérieur</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="categorie" id="outside">
                                    <label for="outside">Extérieur</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="categorie" id="terrarium">
                                    <label for="terrarium">Terrarium</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="categorie" id="aromat">
                                    <label for="aromat">Plantes aromatiques</label>
                                </div>
                            </div>
                        </div>
                        <div class="line dropdown">
                            <button type="button" class="dropbtn">Entretien <i class="fa-solid fa-angle-down"></i></button>
                            <div class="dropdown-content">
                                <div class="checkbox">
                                    <input type="checkbox" name="entretien" id="easy">
                                    <label for="easy">Facile</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="entretien" id="doable">
                                    <label for="doable">Moyen</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="entretien" id="hard">
                                    <label for="hard">Difficile</label>
                                </div>
                            </div>
                        </div>
                        <div class="line dropdown">
                            <button type="button" class="dropbtn">Exposition <i class="fa-solid fa-angle-down"></i></button>
                            <div class="dropdown-content">
                                <div class="checkbox">
                                    <input type="checkbox" name="exposition" id="sun">
                                    <label for="sun">Plein soleil</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="exposition" id="misun">
                                    <label for="misun">Lumière vive indirect</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="exposition" id="middle">
                                    <label for="middle">Mi-ombre</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="exposition" id="shadow">
                                    <label for="shadow">Ombre</label>
                                </div>
                            </div>
                        </div>
                        <div class="line dropdown">
                            <button type="button" class="dropbtn">Taille de pot <i class="fa-solid fa-angle-down"></i></button>
                            <div class="dropdown-content">
                                <div class="checkbox">
                                    <input type="checkbox" name="taille" id="pousse">
                                    <label for="pousse">5-15cm</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="taille" id="middle">
                                    <label for="middle">20-30cm</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="taille" id="shadow">
                                    <label for="shadow">Plus +</label>
                                </div>
                            </div>
                        </div>
                        <div class="filtre-btn">
                            <input type="reset" value="Réinitialiser">
                            <input type="submit" value="Filtrer">
                        </div>
                    </form>
                </div>
                <div class="fond-img-left">
                    <img src="<?php echo vite_get_asset('content/feuille.png'); ?>" alt="">
                </div>
            </aside>
            <section class="container-cartes">
                
                <?php for ($i=0;$i<12;$i++){
                        include(__DIR__.'../includes/parts/carte.php');
                    }
                    ?>
                
            </section>
        </main>
        <?php include_once(__DIR__.'../includes/parts/footer.php'); ?>
    </body>
</html>