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
            <main id="contact">
                <section class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158.1273066344004!2d5.576736758375497!3d50.6450057250057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c0fb1073af4751%3A0x7ac8bc35690473fa!2zVsOpZ8OpdGFsIFDDqXRhbGU!5e0!3m2!1sfr!2sbe!4v1776770386086!5m2!1sfr!2sbe" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </section>
                <section class="adresse">
                    <div class="fond-img-left">
                        <img src="<?php echo vite_get_asset('content/plante(4).png'); ?>" alt="">
                    </div>
                    <div class="coordonnée">
                        <h3>Coordonnées</h3>
                        <p>En Neuvice 28, 4000 Liège</p>
                        <p><a href="tel:+">+32412345678</a></p>
                        <p><a href="mailto:">info@serpedor.com</a></p>
                    </div>
                    <div class="horaires">
                        <h3>Horaires</h3>
                        <div class="horaire">
                            <div class="jours">
                                <p>Lundi</p>
                                <p>Mardi</p>
                                <p>Mercredi</p>
                                <p>Jeudi</p>
                                <p>Vendredi</p>
                                <p>Samedi</p>
                                <p>Dimanche</p>
                            </div>
                            <div class="heures">
                                <p>Fermé</p>
                                <p>Fermé</p>
                                <p>10h00-18h00</p>
                                <p>10h00-18h00</p>
                                <p>10h00-18h00</p>
                                <p>10h00-18h00</p>
                                <p>10h00-18h00</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="form">
                    <div class="fond-img-right">
                        <img src="<?php echo vite_get_asset('content/plante(5).png'); ?>" alt="">
                    </div>
                    <form action="" method="post">
                        <h3>Vous avez une question?</h3>
                        <div class="titre">
                            <input type="radio" name="titre" id="madame">
                            <label for="madame">Mme</label>
                            <input type="radio" name="titre" id="mademoiselle">
                            <label for="mademoiselle">Mlle</label>
                            <input type="radio" name="titre" id="monsieur">
                            <label for="monsieur">M.</label>
                        </div>
                        <div class="contact">
                            <input type="text" name="name" id="name" placeholder="Nom">
                            <input type="text" name="surname" id="surname" placeholder="Prénom">
                            <input type="email" name="mail" id="mail" placeholder="Email">
                            <input type="tel" name="tel" id="tel" placeholder="Téléphone">
                        </div>
                        <textarea name="demande" id="demande" placeholder="Demande..."></textarea>
                        <input type="submit" value="Envoyer">
                    </form>
                </section>
            </main>
        <?php include_once(__DIR__.'../includes/parts/footer.php') ?>
    </body>
</html>