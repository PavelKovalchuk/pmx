<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 28.01.2018
 * Time: 13:44
 */


function get_template_testimonial_banner($text, $person_photo, $person, $position, $bg_image = false){

	if( !$text || !$person_photo || !$person || !$position){
		return false;
	}

	if(!$bg_image){

		$image_id = get_option( '_promx_testimonials_data_options' )['background_image_id'];
		$bg_image = wp_get_attachment_image_src( $image_id , 'full')[0];

	}

	?>

	<section id="banner">
		<div class="featured-banner">
			<div class="fullwidth" style="background-image: url('<?php echo $bg_image; ?>');">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<p class="slider-text slider-text-quote"><?php echo $text; ?></p>
						</div>
						<div class="col-sm-6">
							<div class="banner-person">
								<div class="banner-person_img">
									<img src="<?php echo $person_photo; ?>" alt="<?php print_image_alt($person); ?>">
								</div>
								<div class="banner-person_info">
									<strong><?php echo $person; ?></strong>
									<span><?php echo $position; ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
}

function get_template_testimonial_intro($text, $logo, $company){

	if( !$text || !$logo || !$company ){
		return false;
	}

	?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<article>
						<div class="row">
							<div class="col-sm-5 col-md-4">
								<img src="<?php echo $logo; ?>" class="img-responsive" alt="<?php print_image_alt($company); ?>">
							</div>
							<div class="col-sm-7 col-md-8">
								<p class="font-big"><?php echo $text; ?></p>
							</div>
						</div>
					</article>
				</div>
			</div>

		</div>
	</section>

	<?php
}

function __get_tesimonials_repeater($arr){
    if(!is_array($arr)){
        return false;
    }
	 foreach ($arr as $item){
		 ?><dd><?php echo  $item; ?></dd><?php
	 }
}


function get_template_testimonial_content($website, $website_target, $customer_size, $country, $industry, $software, $content){

	if( !$website || !$website_target || !$customer_size || !$country || !$industry || !$software || !$content ){
		return false;
	}

    $options = get_option( '_promx_testimonials_data_options');
	$website_header = $options['website_' . CURRENT_LANG_CODE];
	$customer_size_header = $options['customer_size_' . CURRENT_LANG_CODE];
	$country_header = $options['country_' . CURRENT_LANG_CODE];
	$industry_header = $options['industry_' . CURRENT_LANG_CODE];
	$software_header = $options['software_' . CURRENT_LANG_CODE];
	$inform_title_header = $options['inform_title_' . CURRENT_LANG_CODE];

	$customer_size_arr = explode(',', $customer_size);
	$country_arr = explode(',', $country);
	$industry_arr = explode(',', $industry);
	$software_arr = explode(',', $software);


	?>

    <section id="reference" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article class="ref-company-article">
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="ref-company-info ref-company-article__info">
                                    <div class="ref-company-info__item">
                                        <div class="ref-company-info__item_icon">
                                            <span class="icon-ref icon-ref-laptop"></span>
                                        </div>
                                        <div class="ref-company-info__item_info">
                                            <dl>
                                                <dt><?php echo $website_header; ?>:</dt>
                                                <dd>
                                                    <a href="<?php echo $website_target; ?>" target="_blank" rel="nofollow"><?php echo $website; ?></a>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="ref-company-info__item">
                                        <div class="ref-company-info__item_icon">
                                            <span class="icon-ref icon-ref-cube"></span>
                                        </div>
                                        <div class="ref-company-info__item_info">
                                            <dl>
                                                <dt><?php echo $customer_size_header; ?>:</dt>
                                                <?php __get_tesimonials_repeater($customer_size_arr); ?>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="ref-company-info__item">
                                        <div class="ref-company-info__item_icon">
                                            <span class="icon-ref icon-ref-globe"></span>
                                        </div>
                                        <div class="ref-company-info__item_info">
                                            <dl>
                                                <dt><?php echo $country_header; ?>:</dt>
	                                            <?php __get_tesimonials_repeater($country_arr); ?>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="ref-company-info__item">
                                        <div class="ref-company-info__item_icon">
                                            <span class="icon-ref icon-ref-cogwheels"></span>
                                        </div>
                                        <div class="ref-company-info__item_info">
                                            <dl>
                                                <dt><?php echo $industry_header; ?>:</dt>
	                                            <?php __get_tesimonials_repeater($industry_arr); ?>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="ref-company-info__item">
                                        <div class="ref-company-info__item_icon">
                                            <span class="icon-ref icon-ref-laptop-code"></span>
                                        </div>
                                        <div class="ref-company-info__item_info">
                                            <dl>
                                                <dt><?php echo $software_header; ?>:</dt>
	                                            <?php __get_tesimonials_repeater($software_arr); ?>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <header class="text-center">
                                    <h2 class="header-title small-size">
	                                    <?php echo $inform_title_header; ?>
                                    </h2>
                                </header>
                                <div class="entry-content">
                                    <p class="font-big">
	                                    <?php echo $content; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

	<?php
}
