<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
    <div class="container">
        <div class="header">
            <h2 class="page-title">
                <span>Proizvodi na Akciji</span> 


                <small><?php echo ($totalRows); ?> proizvoda</small>
            </h2>
        </div>
    </div>
</div>

<!-- ======== @Region: #content ======== -->
<div id="content">
    <div class="container portfolio">
        <ul class="thumbnails row block projects" id="quicksand">
            <?php foreach ($productsOnSaleByPage as $productOnSaleByPage) { ?>
                <li class="col-md-3">
                    <?php include __DIR__ . '/t_products_on_sale_preview.php'; ?>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="text-center">
        <ul class="pagination pagination-centered">
            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>

                <?php if ($page != $i) { ?>
                    <li><a href="/sale.php?page=<?php echo ($i); ?>"><?php echo ($i); ?></a></li>
                <?php } else { ?>
                    <li class="active"><span><?php echo ($i); ?></span></li>
                        <?php } ?>
                    <?php } ?>
                    
                    
                    
                <?php if ($page > 1) { ?>
                <li><a href="/sale.php?page=<?php echo ($previousPage = $page-1); ?>"> << </a></li>
                
                <?php }?>

                <?php if ($page != $totalPages) { ?>
                <li><a href="/sale.php?page=<?php echo ($nextPage = $page+1); ?>"> >> </a></li>
                
                <?php }?>
            
                <?php if ($page == $totalPages) { ?>
                <li><a href="/sale.php?page=<?php echo ($firstPage = $totalPages / $totalPages); ?>">Go to First Page</a></li>
            <?php } ?>



        </ul>
    </div>
</div>