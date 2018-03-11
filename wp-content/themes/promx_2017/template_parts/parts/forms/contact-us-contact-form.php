<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 12.02.2018
 * Time: 11:15
 */

/**
 * TODO - this is temporary solution to store all forms. Before implementing new system of forms handling
 */
//function get_form_template_contact_us() {

	//TODO - get something unique to get info about page from which person got to this page
    //TODO - $global_db_settings !!!!

$field_salutation = 'salutation';
$field_first_name = 'first_name';
$field_last_name = 'last_name';
$field_email = 'email';
$field_phone = 'phone';
$field_company = 'company';
$field_country = 'country';
$field_message = 'message';


	?>

	<form action="" method="post" class="bg-secondary contact-form js-contact-form" name="<?php echo ProMXTemplateEngine::getFormName(); ?>">
		<h2 class="contact-form-title light">
			<strong>Contact</strong> US
		</h2>

        <?php ProMXTemplateEngine::getNecessaryHiddenInput(); ?>

		<div class="form-horizontal">
			<div class="form-group">
				<div class="col-sm-4 col-md-4">
					<?php
					ProMXTemplateEngine::radioField(
						$field_salutation,
						ProMXTemplateEngine::getRadio($field_salutation, 'he'),
						ProMXTemplateEngine::getRequired($field_salutation),
						'optionHerre',
						false,false);
					?>
				</div>
				<div class="col-sm-6">
					<?php
					ProMXTemplateEngine::radioField(
						$field_salutation,
						ProMXTemplateEngine::getRadio($field_salutation, 'she'),
						ProMXTemplateEngine::getRequired($field_salutation),
						'optionFrau',
						false,false);
					?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
			    <?php
                ProMXTemplateEngine::inputTextField(
	                $field_first_name,
	                ProMXTemplateEngine::getRequired($field_first_name),
	                ProMXTemplateEngine::getPlaceholder($field_first_name),
                    false,false, false);
                ?>
			</div>
			<div class="col-sm-6">
				<?php
				ProMXTemplateEngine::inputTextField(
					$field_last_name,
					ProMXTemplateEngine::getRequired($field_last_name),
					ProMXTemplateEngine::getPlaceholder($field_last_name),
                    false,false, false);
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<?php
				ProMXTemplateEngine::inputTextField(
					$field_email,
					ProMXTemplateEngine::getRequired($field_email),
					ProMXTemplateEngine::getPlaceholder($field_email),
					false,false, false);
				?>
			</div>
			<div class="col-sm-6">
				<?php
				ProMXTemplateEngine::inputTextField(
					$field_phone,
					ProMXTemplateEngine::getRequired($field_phone),
					ProMXTemplateEngine::getPlaceholder($field_phone),
					false,false, false);
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<?php
				ProMXTemplateEngine::inputTextField(
					$field_company,
					ProMXTemplateEngine::getRequired($field_company),
					ProMXTemplateEngine::getPlaceholder($field_company),
					false,false, false);
				?>
			</div>
			<div class="col-sm-6">
				<?php
				ProMXTemplateEngine::inputTextField(
					$field_country,
					ProMXTemplateEngine::getRequired($field_country),
					ProMXTemplateEngine::getPlaceholder($field_country),
					false,false, false);
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php
				ProMXTemplateEngine::textareaField(
					$field_message,
					ProMXTemplateEngine::getRequired($field_message),
					ProMXTemplateEngine::getPlaceholder($field_message),
					false,false, false);
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php
				ProMXTemplateEngine::button(
					false
                        , false
                        , 'btn-primary btn-outline-inverted'
                        , 'text-center'

                );
				?>
			</div>
		</div>
	</form>

	<?php

//}