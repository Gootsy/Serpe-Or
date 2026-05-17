<article class="card">
    <div class="card-img">
        <img src="<?php echo vite_get_asset('produits/'. $plante['image_1']); ?>" alt="">
    </div>
    <div class="card-title">
        <h3><?= $plante['name'] ?></h3>
        <p><?= $plante['price'] ?>€</p>
    </div>
    <div class="details">
        <div class="detail caring">
            <i class="fa-solid fa-hand-holding-heart"></i>
            <p class="detail-title">Entretien</p>
            <p><?= $plante['care'] ?></p>
        </div>
        <div class="detail wet">
            <i class="fa-solid fa-droplet"></i>
            <p class="detail-title">Humidité</p>
            <p><?= $plante['humidity'] ?>%</p>
        </div>
        <div class="detail pouring">
            <i class="fa-solid fa-shower"></i>
            <p class="detail-title">Arrosage</p>
            <p><?= $plante['water'] ?></p>
        </div>
    </div>
    <div>
        <a class="button" href="detail.php?id=<?= $plante['id_plantes'] ?>">Plus d'information<i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
</article>