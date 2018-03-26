<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 13.02.2018
 * Time: 16:37
 */

$field_first_name = 'first_name';
$field_email = 'email';
	?>

	<form class="form-horizontal <?php echo ProMXTemplateEngine::jsClass(); ?>" name="<?php echo ProMXTemplateEngine::getFormName(); ?>">
        <?php ProMXTemplateEngine::getHeader(); ?>
        <?php ProMXTemplateEngine::getNecessaryHiddenInput(); ?>

		<div class="form-group">
			<div class="col-sm-12">
                <?php
                ProMXTemplateEngine::inputTextField(
                    $field_first_name,
                    ProMXTemplateEngine::getRequired($field_first_name),
                    ProMXTemplateEngine::getPlaceholder($field_first_name),
                    false,false, false);
                ?>
			</div>
			<div class="col-sm-12">
                <?php
                ProMXTemplateEngine::inputTextField(
                    $field_email,
                    ProMXTemplateEngine::getRequired($field_email),
                    ProMXTemplateEngine::getPlaceholder($field_email),
                    false,false, false);
                ?>
			</div>
            <div class="col-sm-12 black-color">
				<?php ProMXTemplateEngine::privacyPolicyField('_sidebar'); ?>
            </div>
			<div class="col-sm-12 button-div">
                <?php
                ProMXTemplateEngine::button(
                    false
                    , false
                    , 'btn-primary'
                    , 'text-center'

                );
                ?>
			</div>
		</div>
	</form>

	<?php
