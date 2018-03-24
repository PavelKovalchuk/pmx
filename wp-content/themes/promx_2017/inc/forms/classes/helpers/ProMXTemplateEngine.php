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
	    self::getHiddenCurrentPage();
	    self::getHiddenReferPage();
    }

	public static function jsClass()
    {
        echo self::getJSFormClass();
    }

	public static function getHeader($form_title = '', $classes = '')
	{

		$form_title = ($form_title) ? $form_title : self::getFormTitle();

		if(!$form_title){
		    return;
        }

		?>
        <h2 class="contact-form-title light <?php if($classes){echo $classes; }?>">
	        <?php echo $form_title; ?>
        </h2>
		<?php
	}

	public static function getHiddenCurrentPage()
	{
		?>
        <input type="hidden" name="current_page" value="<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
		<?php
	}

	public static function getHiddenReferPage()
	{
		?>
        <input type="hidden" name="refer_page" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
		<?php
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

	public static function selectField($name_attr, $options_data, $placeholder, $is_required = false, $id_attr = '',  $field_class = '', $parent_class = '')
	{
		if(!($name_attr) || empty($options_data) || !is_array($options_data) || !$placeholder){
			return;
		}

		?>
        <div class="form-group <?php if($parent_class){echo $parent_class; }?> <?php if($is_required){echo self::getRequiredClass(); }?>">
            <select name="<?php echo $name_attr; ?>" class="promx-select js-contact-form-field form-control <?php if($field_class){ echo $field_class; }?>"  data-max-length = "<?php echo self::getFieldMaxLength($name_attr) ?>" data-placeholder="<?php echo $placeholder; if($is_required){ echo self::getRequiredSign(); } ?>"  >
                <option></option>

                <?php
                foreach ($options_data as $option){

                    if(!$option['value'] || !$option['title'] || !$option['code']){
                        continue;
                    }

                    ?>

                    <option value="<?php echo $option['value']; ?>" data-option-code="<?php echo $option['code']; ?>" <?php if($id_attr){	?>id="<?php echo $id_attr; ?>" <?php } ?>><?php echo $option['title']; ?></option>

                <?php }  ?>

            </select>
	        <?php self::getHelpBlock(); ?>
        </div>
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
                    class="radio-input js-contact-form-field <?php if($field_class){echo $field_class; }?>"
                    data-max-length = "<?php echo self::getFieldMaxLength($name_attr) ?>"
            >
            <label   class="radio-label js-radio-label"
                    <?php if($id_attr){	?>
                    for="<?php echo $id_attr; ?>"
		            <?php }	?> >
                <?php echo $placeholder; ?>
            </label>
	        <?php self::getHelpBlock(); ?>
        </div>
		<?php
	}

	protected static function getHelpBlock($text = '', $is_visible = false, $help_block_class = '')
	{
		?>
		<span class="help-block js-message-block <?php if($help_block_class){ echo $help_block_class; } ?><?php if(!$is_visible){ echo 'help-block-display-none'; } ?>"><?php if($text){echo $text; }?></span>
		<?php
	}

    protected static function getHelpBlockNoJs($text = '', $is_visible = false, $help_block_class = '')
    {
        ?>
        <span class="help-block <?php if($help_block_class){ echo $help_block_class; } ?><?php if(!$is_visible){ echo 'help-block-display-none'; } ?>"><?php if($text){echo $text; }?></span>
        <?php
    }

	public static function uploadField($name_attr, $is_required = false, $placeholder = '', $id_attr = '',  $field_class = '', $parent_class = '', $help_block_text = '', $is_visible_help_block = false, $help_block_class = '')
	{
		if(!$name_attr){
			return;
		}
		?>
        <div class="form-group <?php if($parent_class){echo $parent_class; }?> ">

            <label <?php if($id_attr){	?>
                    for="<?php echo $id_attr; ?>"
		            <?php }	?>  class="c-file <?php if($is_required){echo self::getRequiredClass(); }?>">
                <input type="file"
                       name="resume_file"
                        <?php if($id_attr){	?>
                            id="<?php echo $id_attr; ?>"
                        <?php }	?>
                       class="upload-file-input js-contact-form-field js-upload-file <?php if($field_class){echo $field_class; }?>"
                       data-max-length = "<?php echo self::getFieldMaxLength($name_attr) ?>"
                >
                <i class="fa fa-paperclip" aria-hidden="true"></i>
                <?php if($placeholder){ ?>
                    <?php echo $placeholder; if($is_required){echo self::getRequiredSign(); } }?>
                <?php self::getHelpBlock(); ?>
            </label>

			<?php self::getHelpBlockNoJs($help_block_text, $is_visible_help_block, $help_block_class); ?>
        </div>
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
				class="form-control js-contact-form-field <?php if($field_class){echo $field_class; }?>"
                data-max-length = "<?php echo self::getFieldMaxLength($name_attr) ?>"
				<?php if($placeholder){ ?>
				placeholder="<?php echo $placeholder; if($is_required){echo self::getRequiredSign(); } ?>"<?php }?>
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
				class="form-control js-contact-form-field <?php if($field_class){echo $field_class; }?>"
                data-max-length = "<?php echo self::getFieldMaxLength($name_attr) ?>"
				<?php if($placeholder){ ?>
				placeholder="<?php echo $placeholder; if($is_required){echo self::getRequiredSign(); } ?>"<?php }?>></textarea>

			<?php self::getHelpBlock(); ?>
		</div>
		<?php

	}

	public static function button($text = false, $id_attr = '',  $button_class = '', $parent_class = '')
	{
		$text_display = ($text) ? $text : self::getFormButton();

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