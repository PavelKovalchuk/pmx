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
function get_form_template_career() {

	//TODO - use unique_id of ACF accordion items of Accordion block Field group for select

	?>
	<form action="" method="post" class="bg-secondary careers-contact-form">
		<h2>Send your resume now!</h2>
		<div class="form-group">
			<input type="text" name="name" class="form-control" placeholder="Name*" aria-describedby="helpBlock2">
			<span id="helpBlock2" class="help-block" style="display: none;">A block of help text.</span>
		</div>
		<div class="form-group">
			<input type="email" name="email" class="form-control" placeholder="E-mail*">
		</div>
		<div class="form-group">
			<select class="promx-select form-control" data-placeholder="Select vacancy">
				<option>Backend developer</option>
				<option>.Net</option>
			</select>
		</div>
		<div class="form-group">
			<textarea class="form-control" rows="4" placeholder="Message"></textarea>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="resume_file" class="c-file">
						<input type="file" name="resume_file" id="resume_file">
						<i class="fa fa-paperclip" aria-hidden="true"></i> Attach file
					</label>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary btn-outline-inverted">Submit</button>
				</div>
			</div>
		</div>
	</form>


	<?php
}
