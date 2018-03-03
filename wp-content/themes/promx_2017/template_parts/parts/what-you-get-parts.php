<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 21.01.2018
 * Time: 15:00
 */

function __get_what_you_get_block_text($title, $text, $number){
	if( !$title || !$text ){
		return false;
	} ?>

	<div class="col-sm-12 col-md-6 whatYouGet-section_row_block">
		<div class="whatYouGet-section_row_block_content">
            <?php if($number){ ?>
			<span class="profit-number"><?php echo $number; ?></span>
            <?php } ?>
			<h2 class="profit-title"><?php echo $title; ?></h2>
			<div class="profit-text">
				<p><?php echo $text; ?></p>
			</div>
		</div>
	</div>

	<?php
}


function __get_what_you_get_block_image($image, $image_alt){

?>
	<div class="col-md-6 hidden-sm hidden-xs whatYouGet-section_row_blank">

		<?php if( $image ){ ?>
            <figure>
                <img src="<?php echo $image ?>" class="img-rsponsive" alt="<?php print_image_alt($image_alt); ?>">
            </figure>
		<?php } ?>

	</div>

	<?php
}


function get_template_what_you_get_section($title, $text, $items, $title_small = false){

	if( !$title || !$text || empty($items)){
		return false;
	}

	?>

	<section id="whatYouGet" class="whatYouGet-section bg-light">
		<div class="fullwidth">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<article class="whatYouGet_article">

							<header class="text-center">
								<h2 class="header-title"><?php echo $title; ?>
									<?php if($title_small){ ?>
										<span class="text-normal"><?php echo $title_small;?></span>
									<?php } ?>
								</h2>
							</header>

							<div class="hr light_hr">&nbsp;</div>

							<div class="row">
								<div class="col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3 text-center title-text">
									<p><?php echo $text; ?></p>
								</div>
							</div>

							<?php $count = 1;

							foreach ($items as $item){ ?>

								<div class="row whatYouGet-section_row">

									<?php if ($count % 2 !== 0) {
										__get_what_you_get_block_image($item['image'], $item['image_alt']);
										__get_what_you_get_block_text($item['title'], $item['text'], $item['number']);
									}else{
										__get_what_you_get_block_text($item['title'], $item['text'], $item['number']);
										__get_what_you_get_block_image($item['image'], $item['image_alt']);
									} ?>


								</div>

								<?php $count ++;
							} ?>

						</article>
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php
}