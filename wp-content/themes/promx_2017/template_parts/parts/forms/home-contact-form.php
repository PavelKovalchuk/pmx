<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 20.01.2018
 * Time: 19:31
 */


/**
 * TODO - this is temporary solution to store all forms. Before implementing new system of forms handling
 */
function get_form_template_main(){
	?>

	<form action="" method="post" class="bg-secondary contact-form">
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
					<input type="text" name="name" class="form-control" placeholder="Name*" aria-describedby="helpBlock2">
					<span id="helpBlock2" class="help-block" style="display: none;">A block of help text.</span>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" name="full-name" class="form-control" placeholder="Full Name*">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" name="company-name" class="form-control" placeholder="Company*">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="E-mail*">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<textarea class="form-control" rows="4" placeholder="Message"></textarea>
				</div>
				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary btn-outline-inverted">Contac Us</button>
				</div>
			</div>
		</div>
	</form>

	<?php
}