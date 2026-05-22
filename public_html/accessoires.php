<?php 
require_once __DIR__ . '/includes/init.php'; 
require_once __DIR__ . '/includes/database.php';

$accessoires = getAccessoires();
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>La Serpe d'Or - Accessoires</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/97e7d2c8b2.js" crossorigin="anonymous"></script>
        <?php echo vite_get_scripts('main.js'); ?>
    </head>

    <body>
        <?php include_once(__DIR__.'/includes/parts/menu.php') ?>
        <main id="accessoires">
            <aside>
                <div class="filtre">
                    <form action="produit.php" method="get">
                        <div class="line search">
                            <input type="search" name="search" id="search" placeholder="Recherche...">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div class="line dropdown">
                            <button type="button" class="dropbtn">Catégories <i class="fa-solid fa-angle-down"></i></button>
                            <div class="dropdown-content">
                                <div class="checkbox">
                                    <input type="checkbox" name="categorie" id="soil">
                                    <label for="soil">Terreau</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="categorie" id="pot">
                                    <label for="pot">Pot</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="categorie" id="substrat">
                                    <label for="substrat">Substrat</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="categorie" id="engrais">
                                    <label for="engrais">Engrais</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="categorie" id="arrosoir">
                                    <label for="arrosoir">Arrosoir</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="categorie" id="tuteur">
                                    <label for="tuteur">Tuteur</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="categorie" id="tool">
                                    <label for="tool">Outil</label>
                                </div>
                            </div>
                        </div>
                        <div class="line dropdown">
                            <button type="button" class="dropbtn">Disponible <i class="fa-solid fa-angle-down"></i></button>
                            <div class="dropdown-content">
                                <div class="checkbox">
                                    <input type="checkbox" name="dispo" id="stock">
                                    <label for="stock">En stock</label>
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
                    $show = 0;
                    foreach($accessoires as $accessoire){
                        include(__DIR__.'../includes/parts/carte-acces.php');
                        $show++;
                        if($show>=12){
                            break;
                        }
                    }
                }
                ?>
                
            </section>
        </main>
        <?php include_once(__DIR__.'../includes/parts/footer.php'); ?>
    </body>
</html>