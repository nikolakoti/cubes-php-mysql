<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
    <div class="container">
        <div class="header">
            <h2 class="page-title">
                <span>CRUD - Brands</span>
            </h2>
        </div>
    </div>
</div>

<!-- ======== @Region: #content ======== -->
<div id="content">
    <div class="container portfolio">
        <!--Portfolio feature item-->
        <div class="row">
            <div class="col-md-12">
                <h2>
                    CRUD Brand - List
                    <a href="/crud-brand-insert.php" class="pull-right btn btn-success">
                        <i class="fa fa-plus-circle"></i>
                        New brand
                    </a>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">		
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Website url</th>
                            <th class="actions text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($brands as $brand) { ?>
                            <tr>
                                <td>
                                    #<?php echo htmlspecialchars($brand['id']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($brand['title']); ?>
                                </td>
                                <td>

                                    <a href="<?php echo htmlspecialchars($brand['website_url']); ?>" target="_blank"><?php echo htmlspecialchars($brand['website_url']); ?></a>

                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="/crud-brand-edit.php?id=<?php echo htmlspecialchars($brand['id']); ?>" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="/crud-brand-delete.php?id=<?php echo htmlspecialchars($brand['id']); ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>