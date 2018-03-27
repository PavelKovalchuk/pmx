<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 20.01.2018
 * Time: 20:43
 */

$field_first_name = 'first_name';
$field_email = 'email';
$field_position = 'career_position';
$field_message = 'message';
$field_file = 'file_url';


	?>
	<form method="post" enctype="multipart/form-data" class="bg-secondary careers-contact-form <?php echo ProMXTemplateEngine::jsClass(); ?>" name="<?php echo ProMXTemplateEngine::getFormName(); ?>">
		<?php ProMXTemplateEngine::getHeader(); ?>
		<?php ProMXTemplateEngine::getNecessaryHiddenInput(); ?>

		<?php
		ProMXTemplateEngine::inputTextField(
			$field_first_name,
			ProMXTemplateEngine::getRequired($field_first_name),
			ProMXTemplateEngine::getPlaceholder($field_first_name),
			false,false, false);
		?>

		<?php
		ProMXTemplateEngine::inputTextField(
			$field_email,
			ProMXTemplateEngine::getRequired($field_email),
			ProMXTemplateEngine::getPlaceholder($field_email),
			false,false, false);
		?>

		<?php global $form_positions_data;

		if($form_positions_data){
			ProMXTemplateEngine::selectField(
				$field_position,
				$form_positions_data,
				ProMXTemplateEngine::getPlaceholder($field_position),
				ProMXTemplateEngine::getRequired($field_position),
				false,false, false);
		}

		?>
		<?php
		ProMXTemplateEngine::textareaField(
			$field_message,
			ProMXTemplateEngine::getRequired($field_message),
			ProMXTemplateEngine::getPlaceholder($field_message),
			false,false, false);
		?>
        <div class="row">
            <div class="col-sm-12  <?php echo ProMXTemplateEngine::getJSRadioGroupClass(); ?>">
	            <?php ProMXTemplateEngine::privacyPolicyField(); ?>
            </div>
        </div>
		<div class="row">
			<div class="col-sm-6">
				<?php
				ProMXTemplateEngine::uploadField(
					$field_file,
					ProMXTemplateEngine::getRequired($field_file),
					ProMXTemplateEngine::getPlaceholder($field_file),
					'resume_file',false, false
                    , ProMXTemplateEngine::getUploadAllowedFormatsText()
                ,true
                , 'help-block-white');
				?>
			</div>
			<div class="col-sm-6">
				<?php
				ProMXTemplateEngine::button(
					false
					, false
					, 'btn-primary btn-outline-inverted'
					, 'text-right'
				);
				?>
			</div>
		</div>
	</form>


	<?php

