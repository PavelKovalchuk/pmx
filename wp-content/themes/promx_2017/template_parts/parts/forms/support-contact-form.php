<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10.02.2018
 * Time: 11:45
 */

$field_salutation = 'salutation';
$field_first_name = 'first_name';
$field_last_name = 'last_name';
$field_email = 'email';
$field_phone = 'phone';
$field_company = 'company';
$field_country = 'country';
$field_message = 'message';
$field_product = 'product';


$products_data = get_field('select_product', ProMXTemplateEngine::getFormPostId());
$products = get_data_cpt_from_array($products_data, 'title');
$additional_products = get_field('additional_products', ProMXTemplateEngine::getFormPostId());

$form_products_data = [];
foreach ($products as $product_post_id => $product_title){
	$form_products_data[] = ProMXTemplateEngine::createOptionsForSelect($product_title, $product_title, $product_title);
}

if(!empty($additional_products)){
	foreach ($additional_products as $key => $add_product){
		$form_products_data[] = ProMXTemplateEngine::createOptionsForSelect($add_product["item"], $add_product["item"], $add_product["item"]);
	}
}

?>

	<form class="bg-secondary contact-form <?php echo ProMXTemplateEngine::jsClass(); ?>" name="<?php echo ProMXTemplateEngine::getFormName(); ?>">
		<?php ProMXTemplateEngine::getHeader(); ?>
		<?php ProMXTemplateEngine::getNecessaryHiddenInput(); ?>

		<div class="form-horizontal">
			<div class="form-group <?php echo ProMXTemplateEngine::getJSRadioGroupClass(); ?>">
				<div class="col-sm-4 col-md-4">
					<?php
					ProMXTemplateEngine::radioField(
						$field_salutation,
						ProMXTemplateEngine::getRadio($field_salutation, 'he'),
						ProMXTemplateEngine::getRequired($field_salutation),
						'salutation_1',
						false,false);
					?>
				</div>
				<div class="col-sm-6">
					<?php
					ProMXTemplateEngine::radioField(
						$field_salutation,
						ProMXTemplateEngine::getRadio($field_salutation, 'she'),
						ProMXTemplateEngine::getRequired($field_salutation),
						'salutation_2',
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
				if($form_products_data){
					ProMXTemplateEngine::selectField(
						$field_product,
						$form_products_data,
						ProMXTemplateEngine::getPlaceholder($field_product),
						ProMXTemplateEngine::getRequired($field_product),
						false,false, false);
				}
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

