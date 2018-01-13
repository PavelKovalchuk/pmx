<!DOCTYPE html>
<html <?php language_attributes(); ?>>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="language" content="<?php echo pll_current_language('slug'); ?>"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <!--<title>Home page</title>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<?php wp_head(); ?>

</head>



<body <?php body_class('home'); ?> >
<!--[if lt IE 10]>
<p class="browsehappy">
    You are using an <strong>outdated</strong> browser. Please
    <a href="https://browsehappy.com/" target="_blank" rel="nofollow">upgrade your browser</a> to improve your experience.
</p>
<![endif]-->
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 header-top hidden-xs">

                <?php get_template_language_switcher(); ?>

                <?php get_template_social_links(); ?>

            </div>
            <div class="col-sm-12 nav-holder">
                <nav class="navbar navbar-promx">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#promx-nav" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand"   href="<?php echo get_home_url(); ?>">
                            <img src="./images/promx.png" alt="Promx logo" class="img-responsive">
                        </a>
	                    <?php get_template_header_logo(); var_dump(is_home()); ?>

                    </div>
                    <div class="collapse navbar-collapse" id="promx-nav">

	                    <?php
	                    $args = array(
		                    'theme_location' => 'primary',
		                    'depth'      => 2,
		                    'container'  => false,
		                    'menu_class'     => 'nav navbar-nav',
		                    'walker'     => new Bootstrap_Walker_Nav_Menu()
	                    );
	                    if (has_nav_menu('primary')) {
		                    wp_nav_menu($args);
	                    }
	                    ?>

                    </div>
                    <div class="right-menu">
                        <button class="btn hidden-xs">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </button>
                        <button class="btn">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </button>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

