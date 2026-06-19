<?php 
session_start();
require_once __DIR__ . '/includes/init.php'; 
require_once __DIR__ . '/includes/database.php';

$accessoires = getAccessoires();

$accesCategorie = $_GET['acces_categories'] ?? [];
$stock = $_GET['stock'] ?? [];
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
                    <form action="accessoires.php" method="get">
                        <div class="line search">
                            <input type="search" name="search" id="search" placeholder="Recherche..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div class="line dropdown">
                            <button type="button" class="dropbtn">Catégories <i class="fa-solid fa-angle-down"></i></button>
                            <div class="dropdown-content">
                                <div class="checkbox">
                                    <input type="checkbox" name="acces_categories[]" value="1" id="soil" <?= in_array('1', $accesCategorie) ? 'checked' : '' ?>>
                                    <label for="soil">Terreau</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="acces_categories[]" value="2" id="pot" <?= in_array('2', $accesCategorie) ? 'checked' : '' ?>>
                                    <label for="pot">Pot</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="acces_categories[]" value="3" id="substrat" <?= in_array('3', $accesCategorie) ? 'checked' : '' ?>>
                                    <label for="substrat">Substrat</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="acces_categories[]" value="4" id="engrais" <?= in_array('4', $accesCategorie) ? 'checked' : '' ?>>
                                    <label for="engrais">Engrais</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="acces_categories[]" value="5" id="arrosoir" <?= in_array('5', $accesCategorie) ? 'checked' : '' ?>>
                                    <label for="arrosoir">Arrosoir</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="acces_categories[]" value="6" id="tuteur" <?= in_array('6', $accesCategorie) ? 'checked' : '' ?>>
                                    <label for="tuteur">Tuteur</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="acces_categories[]" value="7" id="tool" <?= in_array('7', $accesCategorie) ? 'checked' : '' ?>>
                                    <label for="tool">Outil</label>
                                </div>
                            </div>
                        </div>
                        <div class="line dropdown">
                            <button type="button" class="dropbtn">Disponible <i class="fa-solid fa-angle-down"></i></button>
                            <div class="dropdown-content">
                                <div class="checkbox">
                                    <input type="checkbox" name="stock[]" value="dispo" id="stock" <?= in_array('dispo', $stock) ? 'checked' : '' ?>>
                                    <label for="stock">En stock</label>
                                </div>
                            </div>
                        </div>                        
                        <div class="filtre-btn">
                            <a href="accessoires.php" class="btn-reset">Réinitialiser</a>
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
                $filtreVide = !empty($accesCategorie) ||
                            !empty($stock);
                if ($filtreVide && empty($accessoires)){
                ?>
                <div class="error">
                    <p>Veuillez nous excuser. Nos produits sont momentanément invalides...</p>
                </div>
                <?php
                }
                else{
                    $show = 0;
                    foreach($accessoires as $item){
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