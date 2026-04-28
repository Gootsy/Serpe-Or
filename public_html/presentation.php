<?php require_once __DIR__ . '/includes/init.php'; ?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>La Serpe d'Or - Présentation</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/97e7d2c8b2.js" crossorigin="anonymous"></script>
	<?php echo vite_get_scripts('main.js'); ?>
    </head>

    <body>
        <?php include_once(__DIR__.'/includes/parts/menu.php') ?>
            <main id="presentation">
                <div class="fond-img-centre">
                    <img src="<?php echo vite_get_asset('content/plante(2).png'); ?>" alt="">
                </div>
                <section class="presentation-container">
                    <div class="pres-img">
                        <img src="<?php echo vite_get_asset('content/clay-banks-N3SsG7xR-Dg-unsplash.jpg'); ?>" alt="">
                    </div>
                    <div class="pres-txt">
                        <h3>Notre Histoire</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni quaerat minima aperiam quis debitis dolorem quos error voluptates, ratione quas est consequatur officia unde nulla esse explicabo velit necessitatibus dolor?</p>
                    </div>
                </section>
                <section class="presentation-container">
                    <div class="pres-img">
                        <img src="<?php echo vite_get_asset('content/sean-foster-drstUK2WG3Q-unsplash.jpg'); ?>" alt="">
                    </div>
                    <div class="pres-txt">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni quaerat minima aperiam quis debitis dolorem quos error voluptates, ratione quas est consequatur officia unde nulla esse explicabo velit necessitatibus dolor? Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste neque qui, non quaerat velit dignissimos temporibus et iusto cum laborum aperiam exercitationem sit, distinctio laudantium repellat tempora. Est, harum veniam.</p>
                    </div>
                </section>
                <section class="presentation-container">
                    <div class="pres-img">
                        <img src="<?php echo vite_get_asset('content/clay-banks-N3SsG7xR-Dg-unsplash.jpg'); ?>" alt="">
                    </div>
                    <div class="pres-txt">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni quaerat minima aperiam quis debitis dolorem quos error voluptates, ratione quas est consequatur officia unde nulla esse explicabo velit necessitatibus dolor? Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste neque qui, non quaerat velit dignissimos temporibus et iusto cum laborum aperiam exercitationem sit, distinctio laudantium repellat tempora. Est, harum veniam.</p>
                    </div>
                </section>
            </main>
        <?php include_once(__DIR__.'../includes/parts/footer.php') ?>
    </body>
</html>