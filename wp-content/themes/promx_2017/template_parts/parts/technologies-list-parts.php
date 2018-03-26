<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 27.01.2018
 * Time: 15:33
 */


function __get_tech_image_part($data){
	?>

	<div class="col-md-6 hidden-sm hidden-xs whatYouGet-section_row_blank">
        <?php if($data['image']){ ?>
		    <img src="<?php echo $data['image']; ?>" alt="<?php print_image_alt($data['image_alt']); ?>" class="img-responsive">
        <?php } ?>
	</div>

	<?php
}

function __get_tech_text_part($data){
	?>

	<div class="col-sm-12 col-md-6 whatYouGet-section_row_block">
		<div class="whatYouGet-section_row_block_content">
			<h2 class="profit-title"><?php echo $data['title']; ?></h2>
			<div class="profit-text">
				<?php echo $data['text']; ?>
				<a href="<?php echo $data['link_target']; ?>" class="btn btn-primary"><?php print_button_text($data['link_text']); ?></a>
			</div>
		</div>
	</div>

	<?php
}

function get_template_tech_list_section($title, $text, $items){

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

								<h2 class="header-title small-gap"><?php echo $title; ?></h2>

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
											__get_tech_image_part($item);
											__get_tech_text_part($item);
										}else{
											__get_tech_text_part($item);
											__get_tech_image_part($item);
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