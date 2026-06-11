<?php 
require_once __DIR__ . '/includes/init.php'; 
require_once __DIR__ . '/includes/database.php';

$plantes = getPlants();
// $plante = null;

$planteCategorie = $_GET['plante_categories'] ?? [];
$care = $_GET['care'] ?? [];
$exposition = $_GET['exposition'] ?? [];
$taille = $_GET['taille'] ?? [];
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>La Serpe d'Or - Plantes</title>
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
                            <input type="search" name="search" id="search" placeholder="Recherche..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div class="line dropdown">
                            <button type="button" class="dropbtn">Catégorie <i class="fa-solid fa-angle-down"></i></button>
                            <div class="dropdown-content">
                                <div class="checkbox">
                                    <input type="checkbox" name="plante_categories[]" value="1" id="inside" <?= in_array('1', $planteCategorie) ? 'checked' : '' ?>>
                                    <label for="inside">Intérieur</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="plante_categories[]" value="2" id="outside" <?= in_array('2', $planteCategorie) ? 'checked' : '' ?>>
                                    <label for="outside">Extérieur</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="plante_categories[]" value="3" id="terrarium" <?= in_array('3', $planteCategorie) ? 'checked' : '' ?>>
                                    <label for="terrarium">Terrarium</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="plante_categories[]" value="4" id="aromat" <?= in_array('4', $planteCategorie) ? 'checked' : '' ?>>
                                    <label for="aromat">Plantes aromatiques</label>
                                </div>
                            </div>
                        </div>
                        <div class="line dropdown">
                            <button type="button" class="dropbtn">Entretien <i class="fa-solid fa-angle-down"></i></button>
                            <div class="dropdown-content">
                                <div class="checkbox">
                                    <input type="checkbox" name="care[]" value="Facile" id="easy" <?= in_array('Facile', $care) ? 'checked' : '' ?>>
                                    <label for="easy">Facile</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="care[]" value="Moyen" id="doable" <?= in_array('Moyen', $care) ? 'checked' : '' ?>>
                                    <label for="doable">Moyen</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="care[]" value="Difficile" id="hard" <?= in_array('Difficile', $care) ? 'checked' : '' ?>>
                                    <label for="hard">Difficile</label>
                                </div>
                            </div>
                        </div>
                        <div class="line dropdown">
                            <button type="button" class="dropbtn">Exposition <i class="fa-solid fa-angle-down"></i></button>
                            <div class="dropdown-content">
                                <div class="checkbox">
                                    <input type="checkbox" name="exposition[]" value="Plein soleil" id="sun" <?= in_array('Plein soleil', $exposition) ? 'checked' : '' ?>>
                                    <label for="sun">Plein soleil</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="exposition[]" value="Lumière vive indirecte" id="misun" <?= in_array('Lumière vive indirecte', $exposition) ? 'checked' : '' ?>>
                                    <label for="misun">Lumière vive indirecte</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="exposition[]" value="Mi-ombre" id="middle" <?= in_array('Mi-ombre', $exposition) ? 'checked' : '' ?>>
                                    <label for="middle">Mi-ombre</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="exposition[]" value="Ombre" id="shadow" <?= in_array('Ombre', $exposition) ? 'checked' : '' ?>>
                                    <label for="shadow">Ombre</label>
                                </div>
                            </div>
                        </div>
                        <div class="line dropdown">
                            <button type="button" class="dropbtn">Taille de pot <i class="fa-solid fa-angle-down"></i></button>
                            <div class="dropdown-content">
                                <div class="checkbox">
                                    <input type="checkbox" name="taille[]" value="petite" id="pousse" <?= in_array('petite', $taille) ? 'checked' : '' ?>>
                                    <label for="pousse">3-9cm</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="taille[]" value="moyenne" id="middle" <?= in_array('moyenne', $taille) ? 'checked' : '' ?>>
                                    <label for="middle">10-18cm</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="taille[]" value="grande" id="shadow" <?= in_array('grande', $taille) ? 'checked' : '' ?>>
                                    <label for="shadow">Plus +</label>
                                </div>
                            </div>
                        </div>
                        <div class="filtre-btn">
                            <a href="produit.php" class="btn-reset">Réinitialiser</a>
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
                $filtreVide = !empty($planteCategorie) ||
                            !empty($care) ||
                            !empty($exposition) ||
                            !empty($taille);
                if ($filtreVide && empty($plantes)){
                ?>
                <div class="error">
                    <p>Veuillez nous excuser. Nos produits sont momentanément invalides...</p>
                </div>
                <?php
                }
                else{
                    $show = 0;
                    foreach($plantes as $plante){
                        include(__DIR__.'../includes/parts/carte-plant.php');
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