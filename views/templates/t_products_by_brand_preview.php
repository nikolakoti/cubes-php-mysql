<div class="">
    <div class="project">
        <a class="lnk-polaroid" href="/product.php?id=<?php echo $productByBrand['id']; ?>">
            <img 
                class="img-polaroid img-responsive"
                src="/uploads/products/<?php echo htmlspecialchars ($productByBrand['photo_filename']); ?>" 
                alt="<?php echo htmlspecialchars ($productByBrand['title']); ?>"
                >
        </a>
        <h3 class="title">
            <a href="/product.php?id=<?php echo $productByBrand['id']; ?>">
                <?php echo htmlspecialchars ($productByBrand['brand_title']); ?> - 
                    
                    <?php echo htmlspecialchars ($productByBrand['title']); ?>
            </a>
        </h3>
        <div class="row">
            <h4 class="col-xs-5">
                <small>
                    <a href="/category.php?id=<?php echo $productByBrand['category_id']; ?>">
                        <?php echo htmlspecialchars ($productByBrand['category_title']); ?>
                    </a>
                </small>
            </h4>
            <h4 class="col-xs-7 text-right">
                <?php echo htmlspecialchars ($productByBrand['price']); ?>
            </h4>
        </div>
    </div>
</div>