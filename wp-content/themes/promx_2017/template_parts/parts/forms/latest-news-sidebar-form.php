<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.02.2018
 * Time: 16:37
 */

/**
 * TODO - this is temporary solution to store all forms. Before implementing new system of forms handling
 */
function get_form_template_latest_news_sidebar() {
	?>

	<form class="form-horizontal">
		<div class="form-group">
			<div class="col-sm-12">
				<input type="text" class="form-control" id="subscr_name" placeholder="Name*">
			</div>
			<div class="col-sm-12">
				<input type="email" class="form-control" id="subscr_mail" placeholder="E-mail*">
			</div>
			<div class="col-sm-12 button-div">
				<button type="submit" class="btn btn-primary">Subscribe</button>
			</div>
		</div>
	</form>

	<?php
}