<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10.02.2018
 * Time: 15:49
 */

function get_template_careers_text($title, $text){

	if( !$title || !$text){
		return false;
	}

	?>

    <article class="experienced_article">
        <header>
            <h2 class="header-title"><?php echo $title; ?></h2>
        </header>
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-offset-2">
                <p><?php echo $text; ?></p>
            </div>
        </div>
    </article>

	<?php
}



function get_template_accordion($items){

	if( empty($items)){
		return false;
	}

	?>
	<div class="faq_wrap" id="accordion" role="tablist" aria-multiselectable="true">

		<?php foreach ($items as $item){ ?>

			<?php if(!$item['unique_id']){
			    continue;
            } ?>

			<div class="panel faq_wrap_panel">
				<div class="faq_wrap_panel_heading" role="tab" id="heading<?php echo $item['unique_id']; ?>">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $item['unique_id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $item['unique_id']; ?>">
						<div class="panel-title-text">
							<div class="career-position"><?php echo $item['position']; ?></div>
							<div class="career-position-published"><?php echo $item['published']; ?></div>
						</div>
						<i class="fa fa-plus open-icon" aria-hidden="true"></i>
					</a>
				</div>
				<div id="collapse<?php echo $item['unique_id']; ?>" class="faq_wrap_panel_collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $item['unique_id']; ?>">
					<div class="panel-body">
						<?php echo $item['text']; ?>
					</div>
				</div>
			</div>

		<?php } ?>

	</div>

	<?php
}

function get_template_photo_office_section($title, $text, $items){

	if( !$title || !$text || empty($items)){
		return false;
	}

	?>

    <section id="ourPhoto">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <header class="page-header">
                        <h2 class="header-title text-center"><?php echo $title; ?></h2>
                        <div class="row">
                            <div class="col-sm-12 col-md-8 col-lg-offset-2">
                                <p class="subtitle-text-p">
	                                <?php echo $text; ?>
                                </p>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="col-sm-12">
                    <article class="entry-gallery">
                        <div class="row">

	                        <?php foreach ($items as $item){ ?>

                                <figure class="col-sm-6 col-md-4">
                                    <img src="<?php echo $item['image']; ?>" alt="<?php print_image_alt($item['title']); ?>">
                                </figure>

	                        <?php } ?>

                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>


	<?php
}
