<article class="card">
    <div class="card-img">
        <img src="<?php echo vite_get_asset('accessoires/'. $accessoire['image_a']); ?>" alt="">
    </div>
    <div class="card-title">
        <h3><?= $accessoire['name'] ?></h3>
        <p><?= $accessoire['price'] ?>€</p>
    </div>
    
    <div>
        <a class="button" href="accessoire-detail.php?id=<?= $accessoire['id_accessoires'] ?>">Plus d'information<i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
</article>