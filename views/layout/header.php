<?php require_once __DIR__ . '/../../models/m_users.php'; ?> 

<?php require_once __DIR__ . '/../../models/m_categories.php'; ?> 

<?php require_once __DIR__ . '/../../models/m_sections.php'; ?> 




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Framework - Cubes School</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- @todo: fill with your company info or remove -->
        <meta name="description" content="">
        <meta name="author" content="Cubes School">
        <!-- Bootstrap CSS -->
        <link href="/skins/tema/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome CSS -->
        <link href="/skins/tema/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- animate.css CSS -->
        <link href="/skins/tema/plugins/animate/animate.min.css" rel="stylesheet">
        <!-- Flexslider -->
        <link href="/skins/tema/plugins/flexslider/flexslider.css" rel="stylesheet">
        <!-- Theme style -->
        <link href="/skins/tema/css/theme-style.css" rel="stylesheet">
        <!-- Your custom override -->
        <link href="/skins/tema/css/custom-style.css" rel="stylesheet">
        <!-- @option: Colour skins, choose from: 1. colour-blue.css 2. colour-red.css 3. colour-grey.css 4. colour-purple 5. colour-green.css Uncomment line below to enable -->
        <link href="/skins/tema/css/colour-blue.css" rel="stylesheet" id="colour-scheme">
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="/skins/tema/plugins/html5shiv/dist/html5shiv.js"></script>
        <script src="/skins/tema/plugins/respond/respond.min.js"></script>
        <![endif]-->
        <!-- Le fav and touch icons - @todo: fill with your icons or remove -->
        <link rel="shortcut icon" href="//skins/tema/img/favicons/96x96.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/skins/tema/img/favicons/114x114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/skins/tema/img/favicons/72x72.png">
        <link rel="apple-touch-icon-precomposed" href="/skins/tema/img/favicons/96x96.png">
        <link href='https://fonts.googleapis.com/css?family=Monda:400,700' rel='stylesheet' type='text/css'>
    </head>

    <!-- ======== @Region: body ======== -->
    <body class="has-navbar-fixed-top has-highlighted">

        <!-- ======== @Region: #navigation ======== -->
        <div id="navigation" class="wrapper">
            <!--Branding & Navigation Region-->
            <div class="navbar navbar-fixed-top" id="top">
                <div class="navbar-inner">
                    <div class="inner">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle btn btn-navbar" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                <a class="navbar-brand" href="/" title="Home">
                                    <h1>
                                        Kurs PHP
                                    </h1>
                                    <span>Cubes School</span> 
                                </a>
                            </div>
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-right" id="main-menu">
                                    <li>
                                        <a href="/">Home</a>
                                    </li>
                                    <li>
                                        <a href="/products.php">Svi proizvodi</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategorije</a>
                                        <ul class="dropdown-menu" role="menu">

                                            <?php foreach (categoriesFetchAll() as $categoryInMenu) { ?>
                                                <li>
                                                    <a href="/category.php?id=<?php echo htmlspecialchars($categoryInMenu['id']); ?>">
                                                        <?php echo htmlspecialchars($categoryInMenu['title']); ?></a>
                                                </li>
                                            <?php } ?>

                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/all-news.php">Vesti</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sekcije</a>
                                        <ul class="dropdown-menu" role="menu">

                                            <?php foreach (sectionsFetchAll() as $sectionInMenu) { ?>
                                                <li>
                                                    <a href="/news-section.php?id=<?php echo htmlspecialchars($sectionInMenu['id']); ?>">
                                                        <?php echo htmlspecialchars($sectionInMenu['title']); ?></a>
                                                </li> 
                                            <?php } ?>
                                        </ul>
                                    <li>
                                        <a href="/sale.php"><i class="fa fa-star"></i> Akcija</a>
                                    </li>
                                    <?php if (!isUserLoggedIn()) { ?>
                                        <li>
                                            <a href="/login.php"><i class="glyphicon glyphicon-log-in"></i> Login</a>
                                        </li>
                                    <?php } else { ?>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo "Hello, " . htmlspecialchars($_SESSION['logged_in_user']['username']); ?></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="crud-product-list.php">Crud Products</a></li>
                                                <li><a href="/crud-brand-list.php">Crud Brands</a></li>
                                                <li><a href="/crud-category-list.php">Crud Categories</a></li>
                                                <li><a href="/crud-group-list.php">Crud Groups</a></li>
                                                <li><a href="#">Crud Tags</a></li>
                                                <li><a href="/crud-section-list.php">Crud Sections</a></li>
                                                <li><a href="/crud-news-list.php">Crud News</a></li> 
                                                <li><a href="/crud-user-list.php">Crud Users</a></li>
                                                <li><a href="/profile-preview.php">My Profile</a></li>
                                                <li><a href="/logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!--/.nav-collapse -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
