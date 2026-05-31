<article class="card">
    <div class="card-img">
        <img src="<?php echo vite_get_asset('accessoires/'. $item['image_1']); ?>" alt="">
    </div>
    <div class="card-title">
        <h3><?= htmlspecialchars($item['name']) ?></h3>
        <p><?= number_format($item['price'], 2, ',','') ?>€</p>
    </div>
    
    <div>
        <a class="button" href="accessoire-detail.php?id=<?= $item['id_accessoires'] ?>">Plus d'information<i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
</article>