<!-- ======== @Region: #highlighted ======== -->
<div id="highlighted">
    <div class="container">
        <div class="header">
            <h2 class="page-title">
                <span>News in section: <?php echo htmlspecialchars($section['title']); ?></span>
                <small><?php echo htmlspecialchars($totalRows); ?> news</small>
            </h2>
        </div>
    </div>
</div>
<div id="content" class="demos">
    <div class="container">
        <div class="row">
            <!--Blog Roll Content-->
            <div class="col-md-8 blog-list">
                <!-- Blog post -->

                <?php foreach ($news as $oneNews) { ?>
                    <div class="media row">
                        <div class="col-sm-3">
                            <a class="media-photo" href="/one-news.php?id=<?php echo htmlspecialchars($oneNews['id']); ?>">
                                <img src="/uploads/news/<?php echo htmlspecialchars($oneNews['photo_filename']); ?>" alt="<?php echo htmlspecialchars($oneNews['title']); ?>" class="media-object img-polaroid" />
                            </a>
                        </div>
                        <div class="col-sm-9">
                            <div class="media-body">
                                <!-- Meta details -->
                                <ul class="list-inline meta text-muted">
                                    <li><i class="glyphicon glyphicon-calendar"></i> <span class="visible-md-inline visible-lg-inline">Created:</span> <?php echo htmlspecialchars($oneNews['created_at']); ?></li>
                                    <li>
                                        <i class="glyphicon glyphicon-tags"></i> <span class="visible-md-inline visible-lg-inline">Section:</span> 
                                        <a href="/news-section.php?id=<?php echo htmlspecialchars($oneNews['section_id']); ?>"><?php echo htmlspecialchars($oneNews['section_title']); ?></a>
                                    </li>
                                </ul>
                                <h4 class="title media-heading">
                                    <a href="/one-news.php?id=<?php echo htmlspecialchars($oneNews['id']); ?>"><?php echo htmlspecialchars($oneNews['title']); ?></a>
                                </h4>
                                <p><?php echo htmlspecialchars($oneNews['description']); ?></p>
                                <ul class="list-inline links">
                                    <li>
                                        <a href="/one-news.php?id=<?php echo htmlspecialchars($oneNews['id']); ?>" class="btn btn-default btn-xs">
                                            <i class="glyphicon glyphicon-circle-arrow-right"></i>
                                            Read more
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <div class="text-center">
                    <ul class="pagination pagination-centered">
                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?> 

                            <?php
                            $paginationQueryString = http_build_query(array(
                                'id' => $section['id'],
                                'page' => $i
                            ));
                            ?>

                            <?php if ($page != $i) { ?>
                                <li><a href="/news-section.php?<?php echo $paginationQueryString; ?>">
                                <?php echo ($i); ?></a></li>
                            <?php } else { ?>
                                <li class="active"><span><?php echo ($i); ?></span></li>
                                    <?php } ?>
                                <?php } ?>
                    </ul>
                </div>
            </div>
            <!--Sidebar-->
            <div class="col-md-4 sidebar sidebar-right">
                <div class="inner">
                    <div class="block">
                        <span class="btn btn-block btn-info"><i class="fa fa-download"></i> Download Our Press Kit</span>
                        <span class="btn btn-block btn-success"><i class="fa fa-envelope-o"></i> Get In Touch</span>
                        <span class="btn btn-block btn-warning"><i class="fa fa-rss"></i> Subscribe via RSS feed</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>