<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 20.01.2018
 * Time: 20:43
 */
/**
 * TODO - this is temporary solution to store all forms. Before implementing new system of forms handling
 */

	?>

	<form action="" method="post" class="bg-secondary send-application">
		<h2 class="contact-form-title light">SEND YOUR application for participation NOW!</h2>
		<div class="form-horizontal">
			<div class="form-group">
				<div class="col-sm-4 col-md-3">
					<div class="radio promx-radio">
						<input type="radio" name="optionGender" id="optionHerre" value="herre">
						<label for="optionHerre">Herre</label>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
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
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" name="phone" class="form-control" placeholder="Phone*">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<select class="promx-select form-control" data-placeholder="Select event">
						<option>Event1 </option>
						<option>Event2</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary btn-outline-inverted">Send</button>
				</div>
			</div>
		</div>
	</form>

<?php
