<?php
/*
Template Name: Main page
*/

/* variables of content */
 $data = get_fields();
 
 

get_header(); ?>

<main id="main" class="site-content"  role="main">

<div class="wrapper" id="wrapper-home">

	<?php get_template_hero_section($data['link_to_read_blog'], $data['homepage_hero_image_main'], $data['homepage_hero_image_mobile']);  ?>

    <section class="container-fluid section_style blue_bg_block ">


        <div class="container inspire_block">

            <div class="row inspire_block_title_outer">
                <div class="col-lg-12">
                    <h1 class="section_title inspire_block_title"><?php echo $data['inspires_block_title']; ?></h1>
                </div>
            </div>

            <div class="row inspire_items_outer">

                <?php $i = 0; ?>
		        <?php foreach ($data['inspires_items'] as $item){
		            $i++;
		            ?>

                    <div class="col-sm-12 col-md-6 col-lg-4 wow fadeInUp inspire_item inspire_item_<?php echo $i; ?>" data-wow-duration="1s" data-wow-delay="0s" data-wow-offset="10">

                        <div class="inspire_item_inner inspire_item_inner_<?php echo $i; ?>">
                            <div class="inspire_img_outer ">
                                <img src="<?php echo $item['item_image']['url']; ?>" class="inspire_img wow wobble " data-wow-duration="1s" data-wow-delay="1s" alt="<?php echo $item['item_image']['alt']; ?>">
                            </div>

                            <div class="inspire_title_outer ">
                                <h5 class="inspire_title"><?php echo $item['item_title']; ?></h5>
                            </div>

                            <div class="inspire_text_outer ">
                                <p class="inspire_text"><?php echo $item['item_text']; ?></p>
                            </div>
                        </div>

                    </div>

		        <?php } ?>

            </div>

        </div>

        
    </section>
    
    <?php
    $args = array(
	    'numberposts' => 8,
	    'category'    => 0,
	    'orderby'     => 'date',
	    'order'       => 'DESC',
	    'include'     => array(),
	    'exclude'     => array(),
	    'meta_key'    => '',
	    'meta_value'  =>'',
	    'post_type'   => 'post',
	    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    );

    $recent_posts = get_posts( $args );

    //var_dump($data['slider_items']); ?>
    <?php get_template_carousel($data['slider_block_title'], $data['slider_block_text'], $recent_posts, 'home_articles', true, $data['slider_button_text']); ?>

</div><!-- Wrapper end -->

</main>
<!--<div class="header_hero_image"></div>-->
<?php get_footer(); ?>
