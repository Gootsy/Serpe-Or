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
    <?php include_once(__DIR__ . '/includes/parts/menu.php') ?>
    <main id="inscription">
        <div class="inscription-container">
            <div class="connexion">
                <form action="" method="POST">
                    <h3>Connection</h3>
                    <input type="email" name="email" id="email" placeholder="Email">
                    <input type="password" name="password" id="psw" placeholder="Mot de passe">
                    <input type="submit" value="Connecter">
                    <a href="#">MDP oublié</a>
                </form>
                <div class="fond-img-left">
                    <img src="<?php echo vite_get_asset('content/aloes.png'); ?>" alt="">
                </div>
            </div>
            <div class="inscription">
                <form action="" method="post">
                    <h3>Créer son compte</h3>
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom">
                    <input type="text" name="nom" id="nom" placeholder="Nom">
                    <input type="email" name="email" id="email" placeholder="Email">
                    <input type="password" name="password" id="psw" placeholder="Mot de passe">
                    <input type="password" name="confPassword" id="confPsw" placeholder="Confirmer le MDP">
                    <input type="submit" value="S'inscrire">
                </form>
            </div>
        </div>
    </main>
    <?php include_once(__DIR__ . '../includes/parts/footer.php') ?>
</body>

</html>