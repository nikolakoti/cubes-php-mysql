<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
    <div class="container">
        <div class="header">
            <h2 class="page-title">
                <span>Proizvodi brenda: <?php echo htmlspecialchars($brand['title']); ?> </span> 


                <?php if ($totalRows == 1) { ?>
                    <small><?php echo htmlspecialchars($totalRows . ' proizvod'); ?></small>
                <?php } else { ?>
                    <small> <?php echo htmlspecialchars($totalRows . ' proizvoda'); ?> </small>
                <?php } ?>
            </h2>
        </div>
    </div>
</div>

<!-- ======== @Region: #content ======== -->
<div id="content">
    <div class="container portfolio">
        <ul class="thumbnails row block projects" id="quicksand">
            <?php foreach ($productsByBrand as $productByBrand) { ?>
                <li class="col-md-3">
                    <?php include __DIR__ . '/t_products_by_brand_preview.php'; ?>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="text-center">
        <ul class="pagination pagination-centered">
            <?php for ($i = 1; $i <= $totalPages; $i++) { ?> 

                <?php
                $paginationQueryString = http_build_query(array(
                    'id' => $brand['id'],
                    'page' => $i
                ));
                ?>

                <?php if ($page != $i) { ?>
                    <li><a href="/brand.php?<?php echo $paginationQueryString; ?>">
                            <?php echo ($i); ?></a></li>
                <?php } else { ?>
                    <li class="active"><span><?php echo ($i); ?></span></li>
                        <?php } ?>
                    <?php } ?>

            <?php if ($page > 1) { ?>

                <?php
                $paginationPrevious = http_build_query(array(
                    'id' => $brand['id'],
                    'page' => ($page - 1)
                ));
                ?>

                <li><a href="/brand.php?<?php echo htmlspecialchars($paginationPrevious); ?>"> << </a></li>

            <?php } ?>

            <?php if ($page != $totalPages) { ?>
                
                <?php
                $paginationNext = http_build_query(array(
                    'id' => $brand['id'],
                    'page' => ($page + 1)
                ));
                ?>

                <li><a href="/brand.php?<?php echo htmlspecialchars($paginationNext); ?>"> >> </a></li>

            <?php } ?>

            <?php if ($page == $totalPages) { ?>
                
                <?php
                $paginationFirstPage = http_build_query(array(
                    'id' => $brand['id'],
                    'page' => $totalPages / $totalPages
                ));
                ?>

                <li><a href="/brand.php?<?php echo htmlspecialchars($paginationFirstPage); ?>">Go to First Page</a></li>
            <?php } ?>
        </ul>
    </div>
</div>