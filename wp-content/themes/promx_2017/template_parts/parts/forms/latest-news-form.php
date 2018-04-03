<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 21.01.2018
 * Time: 11:49
 */

$field_first_name = 'first_name';
$field_email = 'email';
	?>

	<form class="contact-form subscribe-blog form-horizontal <?php echo ProMXTemplateEngine::jsClass(); ?>" name="<?php echo ProMXTemplateEngine::getFormName(); ?>">
        <?php ProMXTemplateEngine::getHeader(); ?>
        <?php ProMXTemplateEngine::getNecessaryHiddenInput(); ?>


		<div class="form-group">
			<div class="col-sm-6 col-lg-4">
                <?php
                ProMXTemplateEngine::inputTextField(
                    $field_first_name,
                    ProMXTemplateEngine::getRequired($field_first_name),
                    ProMXTemplateEngine::getPlaceholder($field_first_name),
                    false,false, 'subscribe-parent');
                ?>
			</div>
			<div class="col-sm-6 col-lg-4">
                <?php
                ProMXTemplateEngine::inputTextField(
                    $field_email,
                    ProMXTemplateEngine::getRequired($field_email),
                    ProMXTemplateEngine::getPlaceholder($field_email),
                    false,false, 'subscribe-parent');
                ?>
			</div>
            <div class="button-div-outer">
                <div class="col-sm-12 col-lg-4 button-div">
                    <?php
                    ProMXTemplateEngine::button(
                        false
                        , false
                        , 'btn-primary btn-outline-inverted'
                        , 'subscribe-parent subscribe-parent-button'

                    );
                    ?>
                </div>
                <div class="subscribe-privacy-policy">
                    <div class="col-sm-12 <?php echo ProMXTemplateEngine::getJSRadioGroupClass(); ?>">
                        <?php ProMXTemplateEngine::privacyPolicyField(); ?>
                    </div>
                </div>
            </div>

		</div>
	</form>

	<?php
