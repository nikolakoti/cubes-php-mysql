<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
    <div class="container">
        <div class="header">
            <h2 class="page-title">
                <span>
                    Proizvod - 
                    <?php echo htmlspecialchars($product['brand_title']); ?>
                    <?php echo htmlspecialchars($product['title']); ?></span>
            </h2>
        </div>
    </div>
</div>

<!-- ======== @Region: #content ======== -->
<div id="content">
    <div class="container portfolio">
        <!--Portfolio feature item-->
        <div class="row">
            <div class="col-md-7 project-photos">
                <img 
                    class="img-responsive center-block" 
                    alt="<?php echo htmlspecialchars($product['title']); ?>" 
                    src="/uploads/products/<?php echo htmlspecialchars($product['photo_filename']); ?>"
                    >
            </div>
            <div class="col-md-5 sidebar sidebar-right">
                <!-- quick details -->
                <div class="block">
                    <h3 class="block-title">
                        <span><?php echo htmlspecialchars($product['title']); ?></span>
                    </h3>
                    <dl>
                        <dt>Brend:</dt>
                        <dd>
                            <?php echo htmlspecialchars($product['brand_title']); ?>
                        </dd>

                        <dt>Kategorija:</dt>
                        <dd>
                            <a href="/category.php?id=<?php echo htmlspecialchars($product['category_id']); ?>">
                                <?php echo htmlspecialchars($product['category_title']); ?>
                            </a>
                        </dd>

                        <dt>Opis:</dt>
                        <dd>
                            <?php echo htmlspecialchars($product['description']); ?>
                        </dd>

                        <dt>Tagovi:</dt>
                        <dd>
                            <?php foreach ($productTags as $productTag) {?>
                            <label><?php echo htmlspecialchars($productTag['title']); ?> /</label>
                            
                            <?php }?>
                        </dd>
                    </dl>
                </div>
                <h4>
                    <strong>Cena: </strong>
                    <?php echo htmlspecialchars($product['price']); ?>
                    <a href="#" class="btn btn-primary pull-right">Kupi</a>
                </h4>
            </div>
        </div>
        <div class="block">
            <h3 class="block-title">
                Specifikacija
            </h3>
            <div class="block">
                <?php echo htmlspecialchars($product['specification']); ?>
            </div>
        </div>
    </div>
</div>