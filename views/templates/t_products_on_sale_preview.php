<div class="">
    <div class="project">
        <a class="lnk-polaroid" href="/product.php?id=<?php echo $productOnSaleByPage['id']; ?>">
            <img 
                class="img-polaroid img-responsive"
                src="/uploads/products/<?php echo htmlspecialchars ($productOnSaleByPage['photo_filename']); ?>" 
                alt="<?php echo htmlspecialchars ($productOnSaleByPage['title']); ?>"
                >
        </a>
        <h3 class="title">
            <a href="/product.php?id=<?php echo $productOnSaleByPage['id']; ?>">
                <?php echo htmlspecialchars ($productOnSaleByPage['brand_title']); ?> - 
                    
                    <?php echo htmlspecialchars ($productOnSaleByPage['title']); ?>
            </a>
        </h3>
        <div class="row">
            <h4 class="col-xs-5">
                <small>
                    <a href="/category.php?id=<?php echo $productOnSaleByPage['category_id']; ?>">
                        <?php echo htmlspecialchars ($productOnSaleByPage['category_title']); ?>
                    </a>
                </small>
            </h4>
            <h4 class="col-xs-7 text-right">
                <?php echo htmlspecialchars ($productOnSaleByPage['price']); ?>
            </h4>
        </div>
    </div>
</div>