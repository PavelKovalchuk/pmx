<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107266316-1"></script>-->
    <script>
       /* window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-107266316-1');*/
    </script>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="language" content="en"/>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">

        <div class="container-fluid header_full">
            
             <div class="row">
                 
                 <div class="col-lg-12">

                        <nav class="navbar header_nav_part navbar-light">
                            <div class="container header_nav_part_container">

                                <div class="row justify-content-between no-gutters w-100 navbar_row">

                                    <div class="d-flex justify-content-start navbar_brand_outer">

                                        <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/build/img/site_logo-min.png" class="site_logo" alt="Site logo">
                                        </a>

                                    </div>

                                    <div class="d-flex justify-content-end navbar_links_outer">

                                        <button class="navbar-toggler align-self-center navbar-expand-lg ts-nav-menu-toggler"
                                                type="button" data-toggle="slide-collapse"
                                                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>

                                        <!--<div class="collapse navbar-collapse h-100" id="navbarNav">-->
                                        <div class="navbar-collapse h-100" id="navbarNav">
                                            <?php
                                            $args = array(
                                                'theme_location' => 'primary',
                                                'depth'      => 2,
                                                'container'  => false,
                                                'menu_class'     => 'navbar-nav',
                                                'walker'     => new Bootstrap_Walker_Nav_Menu()
                                            );
                                            if (has_nav_menu('primary')) {
                                                wp_nav_menu($args);
                                            }
                                            ?>
                                        </div>

                                    </div>


                                </div>

                            </div>
                        </nav>

               </div>

            </div>


        </div>


	</header><!-- #masthead -->




