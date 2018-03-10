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



	?>

	<form action="" method="post" class="bg-secondary contact-form js-contact-form" name="<?php echo $promx_form_name; ?>">
		<h2 class="contact-form-title light">
			<strong>Contact</strong> US
		</h2>

        <input type="hidden" name="form_name" value="<?php echo $promx_form_name; ?>">
        <input type="hidden" name="form_nonce" value="<?php echo wp_create_nonce($promx_form_name); ?>">

		<div class="form-horizontal">
			<div class="form-group">
				<div class="col-sm-4 col-md-4">
					<div class="radio promx-radio">
						<input type="radio" name="optionGender" id="optionHerre" value="herre">
						<label for="optionHerre">Herre</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="radio promx-radio">
						<input type="radio" name="optionGender" id="optionFrau" value="frau">
						<label for="optionFrau">Frau</label>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" name="first_name" class="form-control" placeholder="Name*" aria-describedby="helpBlock2">
					<span id="helpBlock2" class="help-block" style="display: none;">A block of help text.</span>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" name="last_name" class="form-control" placeholder="Full Name*">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="E-mail*">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" name="phone" class="form-control" placeholder="Phone*">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" name="company" class="form-control" placeholder="Company*">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" name="country2" class="form-control" placeholder="Country*">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<textarea class="form-control" rows="4" placeholder="Message"></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary btn-outline-inverted js-contact-button">Send</button>
				</div>
			</div>
		</div>
	</form>

	<?php
//}