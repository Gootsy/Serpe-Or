<?php
session_start();
require_once __DIR__ . '/includes/init.php';
require_once __DIR__ . '/includes/database.php';

$cart = $_SESSION['cart'] ?? [];
$cartItems = getCartItems($pdo, $cart);
$sousTotal = calculateCartTotal($cartItems);
$transport = 10;
$total = $sousTotal + $transport;

if(isset($_POST['payer'])){
    $prenom=htmlspecialchars(trim($_POST['prenom']));
    $nom=htmlspecialchars(trim($_POST['nom']));
    $email=$_POST['email'];
    $street=htmlspecialchars(trim($_POST['street']));
    $nbr_street=$_POST['nbr_street'];
    $accommodation=htmlspecialchars(trim($_POST['accommodation']));
    $zip=$_POST['zip'];
    $locality=htmlspecialchars(trim($_POST['locality']));
    $country=htmlspecialchars(trim($_POST['country']));
    $tel=$_POST['tel'];

    $validation=true;
    $erreurs=array();
    if (empty($prenom)){
        $validation=false;
        $erreurs['prenom'] = "Prénom vide.";
    }
    if (empty($nom)){
        $validation=false;
        $erreurs['nom'] = "Nom vide.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validation=false;
        $erreurs['email'] = "Email vide.";
    }
    if (empty($street)){
        $validation=false;
        $erreurs['street'] = "Rue vide.";
    }
    if (empty($nbr_street)){
        $validation=false;
        $erreurs['nbr_street'] = "N° de rue vide.";
    }
    if (empty($zip)){
        $validation=false;
        $erreurs['zip'] = "Code postal vide.";
    }
    if (empty($locality)){
        $validation=false;
        $erreurs['locality'] = "Ville vide.";
    }
    if (empty($country)){
        $validation=false;
        $erreurs['country'] = "Pays vide.";
    }
    if (empty($tel)){
        $validation=false;
        $erreurs['tel'] = "N° de téléphone vide.";
    }

    if($validation){
        try{
            $pdo->beginTransaction();

            $req = $pdo->prepare('INSERT INTO users(name_user, surname, email, street, nbr_street, accommodation, zip, locality, country, tel) VALUES (?,?,?,?,?,?,?,?,?,?)');
            $req->execute(array($nom, $prenom, $email, $street, $nbr_street, $accommodation, $zip, $locality, $country, $tel));
            $userId=$pdo->lastInsertId();

            $req = $pdo->prepare('INSERT INTO orders(id_users, total, date_order, status) VALUES(?,?,NOW(), "Pending")');
            $req->execute(array($userId, $total));
            $orderId = $pdo->lastInsertId();

            foreach($cartItems as $item){
                $productId = $item['id'];
                $quantity = $item['quantity'];
                $type = $item['type'];

                if ($type==='plante'){
                    $req = $pdo->prepare('INSERT INTO order_plts(id_orders, id_plantes, plantes_qty) VALUES (?,?,?)');
                    $req->execute(array($orderId, $productId, $quantity));
                }elseif ($type==='accessoire'){
                    $req = $pdo->prepare('INSERT INTO order_acces(id_orders, id_accessoires, accessoire_qty) VALUES (?,?,?)');
                    $req->execute(array($orderId, $productId, $quantity));
                }
            }
            $pdo->commit();
            unset($_SESSION['cart']);

            header('Location: commande-message.php?id=' . $orderId);
            exit;

        } catch (PDOException $e) {
            $pdo->rollBack();
            echo "Vos données sont invalides" . $e->getMessage();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Serpe d'Or - Commande en cours</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/97e7d2c8b2.js" crossorigin="anonymous"></script>
    <?php echo vite_get_scripts('main.js'); ?>
</head>

<body>
    <?php include_once(__DIR__ . '/includes/parts/menu.php') ?>
    <main class="order">
        <h2>Votre commande</h2>
        <form action="" method="post">
        <section class="order-container">
            
            <div class="order-profil">
                <div class="fond-img-right">
                    <img src="<?php echo vite_get_asset('content/plante.png'); ?>" alt="">
                </div>
                <div class="coordonnee">
                        <h3>Vos coordonnées</h3>
                        <div class="coordonnee-input">
                        <div>
                        <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php if(isset($nom)){echo $nom;} ?>">
                        <?php if(isset($erreurs['nom'])) : ?>
                        <p class="erreurs"><?php echo $erreurs['nom']; ?></p>
                        <?php endif; ?>
                        </div>
                        <div>
                        <input type="text" name="prenom" id="prenom" placeholder="Prénom" value="<?php if(isset($prenom)){echo $prenom;} ?>">
                        <?php if(isset($erreurs['prenom'])) : ?>
                        <p class="erreurs"><?php echo $erreurs['prenom']; ?></p>
                        <?php endif; ?>
                        </div>
                        <div>
                        <input type="text" name="street" id="rue" placeholder="Rue" value="<?php if(isset($street)){echo $street;} ?>">
                        <?php if(isset($erreurs['street'])) : ?>
                        <p class="erreurs"><?php echo $erreurs['street']; ?></p>
                        <?php endif; ?>
                        </div>
                        <div>
                        <input type="number" name="nbr_street" id="rueNbre" placeholder="N°" value="<?php if(isset($nbr_street)){echo $nbr_street;} ?>">
                        <?php if(isset($erreurs['nbr_street'])) : ?>
                        <p class="erreurs"><?php echo $erreurs['nbr_street']; ?></p>
                        <?php endif; ?>
                        </div>
                        <div>
                        <input type="text" name="accommodation" id="accommodation" placeholder="Appartement, étage..." value="<?php if(isset($accommodation)){echo $accommodation;} ?>">
                        </div>
                        <div>
                        <input type="number" name="zip" id="zip" placeholder="Code postal" value="<?php if(isset($zip)){echo $zip;} ?>">
                        <?php if(isset($erreurs['zip'])) : ?>
                        <p class="erreurs"><?php echo $erreurs['zip']; ?></p>
                        <?php endif; ?>
                        </div>
                        <div>
                        <input type="text" name="locality" id="localite" placeholder="Localité" value="<?php if(isset($locality)){echo $locality;} ?>">
                        <?php if(isset($erreurs['locality'])) : ?>
                        <p class="erreurs"><?php echo $erreurs['locality']; ?></p>
                        <?php endif; ?>
                        </div>
                        <div>
                        <input type="text" name="country" id="pays" placeholder="Pays" value="<?php if(isset($country)){echo $country;} ?>">
                        <?php if(isset($erreurs['country'])) : ?>
                        <p class="erreurs"><?php echo $erreurs['country']; ?></p>
                        <?php endif; ?>
                        </div>
                        <div>
                        <input type="email" name="email" id="email" placeholder="Email" value="<?php if(isset($email)){echo $email;} ?>">
                        <?php if(isset($erreurs['email'])) : ?>
                        <p class="erreurs"><?php echo $erreurs['email']; ?></p>
                        <?php endif; ?>
                        </div>
                        <div>
                        <input type="tel" name="tel" id="telephone" placeholder="Téléphone" value="<?php if(isset($tel)){echo $tel;} ?>">
                        <?php if(isset($erreurs['tel'])) : ?>
                        <p class="erreurs"><?php echo $erreurs['tel']; ?></p>
                        <?php endif; ?>
                        </div>
                        </div>
                </div>
            </div>
            
            <div class="order-prods">
                <?php foreach ($cartItems as $cartItem) {
                    $id = $cartItem['id'];
                    $product = $cartItem['product'];
                    $quantity = $cartItem['quantity'];
                    $lineTotal = $cartItem['line_total'];
                    $type = $cartItem['type'];
                    
                ?>
                <!-- <time datetime="01-01-2026">01-01-2026</time> -->
                <div class="order-prod">
                    <div class="order-img">
                        <img src="<?php echo vite_get_asset($type . 's/' . $product['image_1']); ?>" alt="">
                    </div>
                    <div class="order-txt">
                        <h3><?= htmlspecialchars($product['name']); ?></h3>
                        <p class="price"><small><span class="prix-uniq"><?= number_format($product['price'], 2, ',', ''); ?></span>€ (à l'unité)</small></p>
                        <p>Quantité: <?= number_format($quantity) ;?></p>
                    </div>
                    <!-- <a href="#" class="edit"><i class="fa-solid fa-pen-to-square"></i></a> -->
                </div>
                <?php }; ?>
                <table>
                    <tr>
                        <td>Sous-total</td>
                        <td id="sousTotal"><?= number_format($sousTotal, 2, ',', ' '); ?>€</td>
                    </tr>
                    <tr>
                        <td>Transport</td>
                        <td id="transport"><?= number_format($transport, 2, ',', ' '); ?>€</td>
                    </tr>
                    <tr class="ttc">
                        <td>Total</td>
                        <td id="ttc"><?= number_format($total, 2, ',', ' '); ?>€</td>
                    </tr>
                </table>
                <div class="order-btn">
                    <input type="submit" class="payer" value="Payer" name="payer">
                </div>
            </div>
            
        </section>
        </form>
    </main>
    <?php include_once(__DIR__ . '../includes/parts/footer.php'); ?>
</body>

</html>