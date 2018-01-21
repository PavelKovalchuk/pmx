<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 21.01.2018
 * Time: 11:49
 */

/**
 * TODO - this is temporary solution to store all forms. Before implementing new system of forms handling
 */
function get_form_template_latest_news() {
	?>

	<form class="form-horizontal">
		<div class="form-group">
			<div class="col-sm-6 col-lg-4">
				<input type="text" class="form-control" id="subscr_name" placeholder="Name*">
			</div>
			<div class="col-sm-6 col-lg-4">
				<input type="email" class="form-control" id="subscr_mail" placeholder="E-mail*">
			</div>
			<div class="col-sm-12 col-lg-4 button-div">
				<button type="submit" class="btn btn-primary btn-outline-inverted">Subscribe</button>
			</div>
		</div>
	</form>

	<?php
}