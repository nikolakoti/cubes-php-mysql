<div class="">
    <div class="project">
        <a class="lnk-polaroid" href="/product.php?id=<?php echo $productOnSale['id']; ?>">
            <img 
                class="img-polaroid img-responsive"
                src="/uploads/products/<?php echo htmlspecialchars ($productOnSale['photo_filename']); ?>" 
                alt="<?php echo htmlspecialchars ($productOnSale['title']); ?>"
                >
        </a>
        <h3 class="title">
            <a href="/product.php?id=<?php echo $productOnSale['id']; ?>">
                <?php echo htmlspecialchars ($productOnSale['brand_title']); ?> - 
                    
                    <?php echo htmlspecialchars ($productOnSale['title']); ?>
            </a>
        </h3>
        <div class="row">
            <h4 class="col-xs-5">
                <small>
                    <a href="/category.php?id=<?php echo $productOnSale['category_id']; ?>">
                        <?php echo htmlspecialchars ($productOnSale['category_title']); ?>
                    </a>
                </small>
            </h4>
            <h4 class="col-xs-7 text-right">
                <small><?php echo htmlspecialchars ($productOnSale['price']); ?></small> 
               
                    
            </h4>
        </div>
    </div>
</div>