<header>
    <div id="myNav" class="overlay-menu">
        <a href="#" class="closebtn" id="navClose"><i class="fa-solid fa-x"></i></a>
        <div class="overlay-menu-content">
            <a href="produit.php">Plantes</a>
            <a href="accessoires.php">Accessoires</a>
            <a href="ateliers.php">Ateliers</a>
            <a href="presentation.php">Présentation</a>
            <a href="contact.php">Contact</a>
        </div>
    </div>
    <nav class="menu">
        <div class="logo">
            <a href="index.php">
                <img src="<?php echo vite_get_asset('logos/logo.png'); ?>" alt="Logo-La Serpe d'Or">
                La Serpe d'Or
            </a>
        </div>
        <div class="icons">
            <?php if(isset($_SESSION['logged_user'])) : ?>
                <div class="dropdown-log">
                    <button class="dropbtn-log">
                        <i class="fa-solid fa-circle-user"></i>
                    </button>

                    <div class="dropdown-content-log">
                        <a href="profil.php">Profil</a>
                        <!-- <?php if ($_SESSION['loggedUser']['role'] === 'Administrator'): ?>
                            <a href="admin.php">Admin</a>
                        <?php endif; ?> -->
                        <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                    </div>
                </div>
            <?php else: ?>
            <a href="inscription.php"><i class="fa-solid fa-circle-user"></i></a>
            <?php endif; ?>
            <a href="panier.php"><i class="fa-solid fa-basket-shopping"></i></a>
            <a href="#" id="navTrigger"><i class="fa-solid fa-bars"></i></a>
        </div>
    </nav>
</header>