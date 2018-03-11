<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11.03.2018
 * Time: 14:30
 */

class ProMXTemplateEngine {

    use ProMXTemplateVariablesTrait;

    public static function getNecessaryHiddenInput()
    {
        self::getHiddenFormName();
        self::getHiddenFormNonce();
    }

    public static function getHiddenFormName()
    {
        ?>
        <input type="hidden" name="form_name" value="<?php echo self::getFormName(); ?>">
        <?php
    }

	public static function getHiddenFormNonce()
	{
		?>
        <input type="hidden" name="form_nonce" value="<?php echo wp_create_nonce(self::getFormName()); ?>">
		<?php
	}

	public static function radioField($name_attr, $placeholder, $is_required = false, $id_attr = '',  $field_class = '', $parent_class = '')
	{
		if(!$name_attr || !$placeholder){
			return;
		}

		?>
        <div class="radio promx-radio <?php if($parent_class){echo $parent_class; }?> <?php if($is_required){echo self::getRequiredClass(); }?>" >
            <input type="radio"
                   name="<?php echo $name_attr; ?>"
	                <?php if($id_attr){	?>
                    id="<?php echo $id_attr; ?>"
	                <?php }	?>
                    value="<?php echo strtolower($placeholder); ?>"
                    class="radio-input <?php if($field_class){echo $field_class; }?>" >
            <label  <?php if($id_attr){	?>
                    for="<?php echo $id_attr; ?>"
		            <?php }	?> >
                <?php echo $placeholder; ?>
            </label>
        </div>
		<?php
	}

	protected static function getHelpBlock($text = '')
	{
		?>
		<span class="help-block" style="display: none;"><?php if($text){echo $text; }?></span>
		<?php
	}

	public static function inputTextField($name_attr, $is_required = false, $placeholder = '', $id_attr = '',  $field_class = '', $parent_class = '')
	{
		if(!$name_attr){
			return;
		}
		?>
		<div class="form-group <?php if($parent_class){echo $parent_class; }?> <?php if($is_required){echo self::getRequiredClass(); }?>">
			<input
				type="text"
				name="<?php echo $name_attr; ?>"
				<?php if($id_attr){	?>
                id="<?php echo $id_attr; ?>"
				<?php }	?>
				class="form-control <?php if($field_class){echo $field_class; }?>"
				<?php if($placeholder){ ?>
				placeholder="<?php echo $placeholder; if($is_required){echo self::getRequiredSign(); } }?>"
			>
			<?php self::getHelpBlock(); ?>
		</div>
		<?php

	}

	public static function textareaField($name_attr, $is_required = false, $placeholder = '', $id_attr = '',  $field_class = '', $parent_class = '', $rows = 4)
	{
		if(!$name_attr){
			return;
		}
		?>
		<div class="form-group <?php if($parent_class){echo $parent_class; }?> <?php if($is_required){echo self::getRequiredClass(); }?>">
			<textarea
				rows="<?php if($rows){echo $rows; }?>"
				name="<?php echo $name_attr; ?>"
				<?php if($id_attr){
				?>id="<?php echo $id_attr; ?>"
				<?php }	?>
				class="form-control <?php if($field_class){echo $field_class; }?>"
				<?php if($placeholder){ ?>
				placeholder="<?php echo $placeholder; if($is_required){echo self::getRequiredSign(); } }?>"></textarea>

			<?php self::getHelpBlock(); ?>
		</div>
		<?php

	}

	public static function button($text = false, $id_attr = '',  $button_class = '', $parent_class = '')
	{
		$text_display = ($text) ? $text : self::getLocalDbSettings()['button_text'];

		?>

		<div class="form-group <?php if($parent_class){echo $parent_class; }?>">
			<button
				type="submit"
				<?php if($id_attr){
				?>id="<?php echo $id_attr; ?>"
				<?php }	?>
				class="js-contact-button btn <?php if($button_class){echo $button_class; }?>">
				<?php echo $text_display; ?>
			</button>
		</div>

		<?php

	}

}