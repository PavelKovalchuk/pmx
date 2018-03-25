<!DOCTYPE html>
<html <?php language_attributes(); ?>>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="language" content="<?php echo pll_current_language('slug'); ?>"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon.ico" rel="shortcut icon" type="image/x-icon" />

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
    <?php get_default_modal_form(); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 header-top">

                <?php get_template_language_switcher(); ?>

                <?php get_template_social_links(); ?>

            </div>
            <div class="col-sm-12 nav-holder">
                <nav class="navbar navbar-promx">
                    <div class="navbar-header">

	                    <?php get_template_header_logo(); ?>

                    </div>
	                <?php $buttons_options_data =  get_option( '_promx_buttons_and_links_options' ); ?>
                    <!--<div class="collapse navbar-collapse dropdown" id="promx-nav">-->
                     <div class="top-nav-menu" id="promx-nav">

                         <button type="button" class="navbar-toggle" id="js-toggler">

                             <span class="icon-bar-outer">
                                 <span class="sr-only">Toggle navigation</span>
                                 <span class="icon-bar top-bar"></span>
                                 <span class="icon-bar middle-bar"></span>
                                 <span class="icon-bar bottom-bar"></span>
                             </span>

                             <span class="toggler-text toggler-text-opened"><?php echo $buttons_options_data['toggler_text_' . CURRENT_LANG_CODE] ?></span>
                             <span class="toggler-text toggler-text-closed"><?php echo $buttons_options_data['toggler_close_text_' . CURRENT_LANG_CODE] ?></span>

                         </button>

	                    <?php
                        $menu_handler = new Bootstrap_Walker_Nav_Menu();
                        get_template_header_menu($menu_handler);?>

                    </div>
                    <div class="right-menu">

	                    <?php get_template_header_menu_icons();?>

                    </div>

                </nav>
            </div>
        </div>
    </div>

	<div class="promx-header-menu-section">
		<?php get_template_menu_blocks($menu_handler->menu_item_id, $menu_handler->menu_data); ?>
    </div>

</header>