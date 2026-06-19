<?php 
session_start();
require_once __DIR__ . '/includes/init.php'; 

// $user=getUsersById($id);

if (!isset($_SESSION['logged_user'])){
    if (isset($_POST['connect'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $erreurs=array();

        if(!$email){
            $erreurs['email']= "Email incorrect";
        }

        if(!empty($email) && !empty($password)){
            try{
                $req = $pdo->prepare('SELECT id_users FROM users WHERE email=:email AND password=:password');
                $req->execute(['email' => $email, 'password' => $password]);
                $users = $req->fetch(PDO::FETCH_ASSOC);

                if ($users) {
                    $_SESSION['logged_user'] = [
                        'email' => $email,
                        'id_users' => $users['id_users']
                    ];
                    if (!empty($_SESSION['pending_checkout'])) {
                        unset($_SESSION['pending_checkout']);
                        header("Location: checkout.php");
                        exit;
                    }
                    header("Location: profil.php");
                    exit();
                }
            } catch (PDOException $e) {
                echo "Vos données sont invalides" . $e->getMessage();
            }
        }else {
            echo 'Les informations envoyées ne permettent pas de vous identifier';
        }
    }
    if (isset($_POST['inscrire'])){
        $prenom=htmlspecialchars(trim($_POST['prenom']));
        $nom=htmlspecialchars(trim($_POST['nom']));
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confPassword=$_POST['confPassword'];

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
        if (empty($password)){
            $validation=false;
            $erreurs['password'] = "Mot de passse vide.";
        }
        if (empty($confPassword)){
            $validation=false;
            $erreurs['confPassword'] = "Mot de passse de confirmation vide.";
        }
        if ($password != $confPassword){
            $validation=false;
            $erreurs['confPassword'] = "Mots de passse différents.";
        }


        if($validation){
            try{
                $req = $pdo->prepare('INSERT INTO users(name_user, surname, email, password) VALUES(?,?,?,?,?)');
                $req->execute(array($nom, $prenom, $email, $password));
                $_SESSION['logged_user'] = [
                    'email' => $email,
                    'name_user' => $nom
                    
                    // 'id_users' => $id
                ];
                // vérification de connexion pour le panier
                if (!empty($_SESSION['pending_checkout'])) {
                    unset($_SESSION['pending_checkout']);
                    header("Location: checkout.php");
                    exit;
                }
                header("Location: profil.php");
                exit();
            } catch (PDOException $e) {
                echo "Vos données sont invalides" . $e->getMessage();
            }
        }
    }
} else {
    header("Location: profil.php");
    exit();
}

?>

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
    <?php include_once(__DIR__ . '/includes/parts/menu.php') ?>
    <main id="inscription">
        <div class="inscription-container">

            <div class="connexion">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h3>Connexion</h3>
                    <input type="email" name="email" id="email" placeholder="Email">
                    <input type="password" name="password" id="psw" placeholder="Mot de passe">
                    <input type="submit" value="Connecter" name="connect">
                    <a href="#">MDP oublié</a>
                </form>
                <div class="fond-img-left">
                    <img src="<?php echo vite_get_asset('content/aloes.png'); ?>" alt="">
                </div>
            </div>

            <div class="inscription">
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Créer son compte</h3>
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom" value="<?php if(isset($prenom)){echo $prenom;} ?>">
                    <?php if(isset($erreurs['prenom'])) : ?>
                        <p class="erreurs"><?php echo $erreurs['prenom']; ?></p>
                    <?php endif; ?>
                    <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php if(isset($nom)){echo $nom;} ?>">
                    <?php if(isset($erreurs['nom'])) : ?>
                        <p class="erreurs"><?php echo $erreurs['nom']; ?></p>
                    <?php endif; ?>
                    <input type="email" name="email" id="email" placeholder="Email" value="<?php if(isset($email)){echo $email;} ?>">
                    <?php if(isset($erreurs['email'])) : ?>
                        <p class="erreurs"><?php echo $erreurs['email']; ?></p>
                    <?php endif; ?>
                    <input type="password" name="password" id="psw" placeholder="Mot de passe" value="<?php if(isset($password)){echo $password;} ?>">
                    <?php if(isset($erreurs['password'])) : ?>
                        <p class="erreurs"><?php echo $erreurs['password']; ?></p>
                    <?php endif; ?>
                    <input type="password" name="confPassword" id="confPsw" placeholder="Confirmer le MDP" value="<?php if(isset($confPassword)){echo $confPassword;} ?>">
                    <?php if(isset($erreurs['confPassword'])) : ?>
                        <p class="erreurs"><?php echo $erreurs['confPassword']; ?></p>
                    <?php endif; ?>
                    <input type="submit" value="S'inscrire" name="inscrire">
                </form>
            </div>

        </div>
    </main>
    <?php include_once(__DIR__ . '../includes/parts/footer.php') ?>
</body>

</html>