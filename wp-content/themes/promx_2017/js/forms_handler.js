(function($) {

    var initFormHandler = function (form){

        var options = {
            //NEW
            'mainAction': 'promx_form',

            //Upload file data
            'uploaderClass': 'js-upload-file',
            'uploader': {},
            'uploadedFile': {},

            //OLD
            'error': 'invalid',
            'valid': 'valid',
            'status': true,
            'messageClass': 'js_message_wrapper',
            'btn': '#js-form-btn',
            'dataCaptcha': false,
            'finalMessageOuter': '#js-form_success_message_outer',
            'finalMessageContainer': '#js-form_success_message',

            messages: {
                'invalidEmail': 'Please provide a valid email.',
                'required': 'This field is required'
            }
        };

        var initSendEvent = function (form){

            var uploadedFile = false;
            if(__isUploadNeeded()){
                var uploadedFile = __uploadFile();
            }

            var formsData = form.serialize();

            //console.log('forms_data', forms_data);
            //console.log('SiteParams.ajaxurl', SiteParams.ajaxurl);
            console.log('uploadedFile', uploadedFile);

            /*var data = {
                action: options.mainAction,
                forms_data: formsData,
                uploaded_file : uploadedFile
            };*/
            var data = new FormData();
            data.append('action', options.mainAction);
            data.append('forms_data', formsData);
            data.append('file', uploadedFile);

            __performSend(data, form);

        };

        var __isUploadNeeded = function () {

            var uploader = form.find('input[type="file"].' + options.uploaderClass);

            if(uploader.length > 0){
                options.uploader = uploader;
                return true;
            }
            return false;
        };

        var __uploadFile = function () {

            var fileData = options.uploader.prop('files')[0];

            options.uploadedFile = fileData;
            //console.log('fileData', fileData);
            //TODO - validate type and size
            //  options.uploadedFile.size
            //  options.uploadedFile.type


            return fileData;

           /* $.ajax({
                url: 'upload.php', // point to server-side PHP script
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(php_script_response){
                    alert(php_script_response); // display response from the PHP script, if any
                }
            });*/

        };

        var __performSend = function(data, form){

            jQuery.ajax({
                url: SiteParams.ajaxurl,
                async: true,
                data: data,
                type: 'POST',

                // cache: false,
                 contentType: false,
                 processData: false,

                success: function(response){

                    console.log(response);

                    if(response.status == 'ok'){

                        //__hideForm(form);

                        //__showSuccessMessage(response.message);
                    }

                }
            });

        };

        var __hideForm = function(form){

            if(form.length > 0){
                form.addClass('move_right_out');
            }

        };

        var __showSuccessMessage = function(message){

            if(message.length > 0){

                var block = $(options.finalMessageOuter);
                var textBlock = $(options.finalMessageContainer);

                textBlock.text(message);
                block.addClass('move_right_in');

            }

        };

        var __checkEmail = function(val, element, message){

            if(val.length > 0 ){
                var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,
                    is_email = re.test(val);
                __addErrorClass(is_email, element, message);

                return is_email;
            }

        };

        var __addErrorClass = function(is_val, name, message) {

            var element = $('[name = "' + name + '"]');

            if (!is_val ) {

                element.addClass(options.error);

                options.status = false;

                if(message){
                    __addErrorMessage(element, message);
                }

            } else {
                element.removeClass(options.error);

            }
        };

        var __addErrorMessage = function(element, message) {

            if (message) {

                var container = '<span class="' + options.messageClass + '" >' + message + '</span>';

                element.parent().append(container);
            }
        };

        var __delErrorMessage = function (form) {

            var errors = $(form).find('.' + options.messageClass);

            if(errors.length > 0){

                $.each( errors, function( key, element ) {

                    element.remove();

                });

            }

        };

        initSendEvent(form);

    };

    var formOptions = {

        //From Data base
        'currentLangCode' : false,
        'textRequired' : false,
        'textEmailError' : false,
        'textPhoneError' : false,
        'textMaxLengthError' : false,
        'textFileTypeError' : false,

        'settingFileTypesValues' : false,
        'settingFileTypesLabels' : false,

        //Classes
        'formClass': 'js-contact-form',
        'fieldClass': 'js-contact-form-field',
        'parentErrorClass': 'form-parent-field-error',
        'parentValidClass': 'form-parent-field-valid',
        'fieldErrorClass': 'form-field-error',
        'fieldValidClass': 'form-field-valid',
        'messageBlockClass' : 'js-message-block',
        'messageBlockHidden' : 'help-block-display-none',
        'fieldRequiredClass': 'required'


    };

    var initFormOptionsDB = function () {

        //Init current Lang code
        if(SiteParams.CurrentLangCode.length > 0){
            formOptions.currentLangCode = SiteParams.CurrentLangCode;
        }

        //Init forms messages texts
        if(SiteParams.FormsMessages){

            var required = SiteParams.FormsMessages['required_field_' + formOptions.currentLangCode];
            if(required.length > 0){
                formOptions.textRequired = required;
            }

            var emailError = SiteParams.FormsMessages['email_error_' + formOptions.currentLangCode];
            if(emailError.length > 0){
                formOptions.textEmailError = emailError;
            }

            var phoneError = SiteParams.FormsMessages['phone_error_' + formOptions.currentLangCode];
            if(phoneError.length > 0){
                formOptions.textPhoneError = phoneError;
            }

            var maxLengthError = SiteParams.FormsMessages['max_length_error_' + formOptions.currentLangCode];
            if(maxLengthError.length > 0){
                formOptions.textMaxLengthError = maxLengthError;
            }

            var fileTypeError = SiteParams.FormsMessages['file_type_error_' + formOptions.currentLangCode];
            if(fileTypeError.length > 0){
                formOptions.textFileTypeError = fileTypeError;
            }

        }

        //Init forms messages texts
        if(SiteParams.FormsSettings){

            var availableTypesValues = SiteParams.FormsSettings['available_file_formats_values'];
            if(availableTypesValues.length > 0){
                formOptions.settingFileTypesValues = availableTypesValues.split(',');
            }

        }

    };


    //Online checking form
    var initFieldsChecker = function () {

        var initForms = function () {

            //Get all forms
            var forms =  $('form' + '.' + formOptions.formClass);

            if(forms.length > 0){

                $.each( forms, function( key, form ) {

                    var fieldsToCheck = $(form).find('.' + formOptions.fieldClass);

                    $.each( fieldsToCheck, function( key, field ) {
                        //console.log('fieldsToCheck',  fieldsToCheck);
                        var $_this = $(this);
                        var isInput = $_this.is("input");
                        var isInputFile = ( $_this.attr( "type" ) == 'file' ) ? true : false;
                        var isTextarea = $_this.is("textarea");
                        var isSelect = $_this.is("select");
                        //console.log('isSelect',  isSelect);
                        if( (isInput || isTextarea) && !isInputFile){
                            checkInputField($_this);
                        }

                        if( isInput && isInputFile){
                            checkInputFileField($_this);
                        }

                        if(isSelect){
                            checkSelectField($_this);
                        }

                    });


                });

            }

        };

        var checkSelectField = function (field) {

            var parent = field.parent();
            var messageBlock = field.siblings('.' + formOptions.messageBlockClass);

            field.on('change', function () {

                var value = field.val();
                console.log('checkSelectField', field);

                var value = __stripTags(field);
                console.log('isCheckedRequired value', value);

                var isCheckedRequired = checkRequired(field, value, parent, messageBlock);
                console.log('isCheckedRequired', isCheckedRequired);
                if(isCheckedRequired === false){
                    return;
                }

                var isEmpty = __isFieldEmpty(value);
                if(isEmpty){
                    __removeErrorClass(field, parent);
                    __removeMessage(messageBlock);
                }


                var isValidEmail = checkEmail(field, value, parent, messageBlock);
                if(isValidEmail === false){
                    return;
                }

                var isValidPhone = checkPhone(field, value, parent, messageBlock);
                if(isValidPhone === false){
                    return;
                }

                var isValidMaxLength = checkMaxLength(field, value, parent, messageBlock);
                if(isValidMaxLength === false){
                    return;
                }

            });

        };

        var checkInputField = function (field) {

            //console.log('checkField',  field);

            var parent = field.parent();
            var messageBlock = field.siblings('.' + formOptions.messageBlockClass);

            field.on('input focusout', function () {

                var value = __stripTags(field);
                console.log('isCheckedRequired value', value);

                var isCheckedRequired = checkRequired(field, value, parent, messageBlock);
                console.log('isCheckedRequired', isCheckedRequired);
                if(isCheckedRequired === false){
                    return;
                }

                var isEmpty = __isFieldEmpty(value);
                if(isEmpty){
                    __removeErrorClass(field, parent);
                    __removeMessage(messageBlock);
                }


                var isValidEmail = checkEmail(field, value, parent, messageBlock);
                if(isValidEmail === false){
                    return;
                }

                var isValidPhone = checkPhone(field, value, parent, messageBlock);
                if(isValidPhone === false){
                    return;
                }

                var isValidMaxLength = checkMaxLength(field, value, parent, messageBlock);
                if(isValidMaxLength === false){
                    return;
                }

            });

        };

        var checkInputFileField = function (field) {

            var parent = field.parent();
            var messageBlock = field.siblings('.' + formOptions.messageBlockClass);

            field.on('change', function () {

                var file = field.prop('files')[0];

                if(!file){
                    return;
                }

                //TODO - check file size
                //TODO - check this settings on backend

                var value = file.name;
                var type = file.type;
                var size = file.size;

                console.log(' file', file);
                console.log('checkInputFileField value', value);


                var isCheckedRequired = checkRequired(field, value, parent, messageBlock);
                console.log('isCheckedRequired', isCheckedRequired);
                if(isCheckedRequired === false){
                    return;
                }

                var isEmpty = __isFieldEmpty(value);
                if(isEmpty){
                    __removeErrorClass(field, parent);
                    __removeMessage(messageBlock);
                }

                var isValidMaxLength = checkMaxLength(field, value, parent, messageBlock);
                if(isValidMaxLength === false){
                    return;
                }

                var isValidFileType = checkFileType(field, type, parent, messageBlock);
                if(isValidFileType === false){
                    return;
                }

            });

        };

        initForms();

    };

    var checkRequired = function (field, value, parent, messageBlock) {

        var isRequired = __isFieldRequired(parent);

        if(isRequired){

            var isEmpty = __isFieldEmpty(value);
            if(!isEmpty){
                //is not empty
                __removeErrorClass(field, parent);
                __removeMessage(messageBlock);
                return true;
            }

             __addErrorClass(field, parent);
             __addMessage(messageBlock, formOptions.textRequired);
            return false;

        }

        return null;
    };

    var checkEmail = function (field, value, parent, messageBlock) {

        var isEmail = __isEmailField(field);

        if(isEmail && value.length > 0 ){
            var regularExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var is_email = regularExp.test(String(value).toLowerCase());

            if(!is_email){
                __addErrorClass(field, parent);
                __addMessage(messageBlock, formOptions.textEmailError);
                return false;
            }

            __removeErrorClass(field, parent);
            __removeMessage(messageBlock);
            return true;

        }

        return null;

    };

    var checkPhone = function (field, value, parent, messageBlock) {

        var isPhone = __isPhoneField(field);

        if(isPhone && value.length > 0 ){
            var regularExp = /^[/+]?[0-9-/(/)\s]+$/;
            var is_phone = regularExp.test(String(value).toLowerCase());

            if(!is_phone){
                __addErrorClass(field, parent);
                __addMessage(messageBlock, formOptions.textPhoneError);
                return false;
            }

            __removeErrorClass(field, parent);
            __removeMessage(messageBlock);
            return true;

        }

        return null;

    };

    var checkMaxLength = function (field, value, parent, messageBlock) {

        var maxLength = field.data('max-length');

        if(!maxLength){
            return false;
        }

        if(value.length > maxLength){
            __addErrorClass(field, parent);
            __addMessage(messageBlock, formOptions.textMaxLengthError + ' ' +  maxLength);
            return false;
        }

        __removeErrorClass(field, parent);
        __removeMessage(messageBlock);
        return true;

    };

    var checkFileType = function (field, type, parent, messageBlock) {

        if(!type){
            return false;
        }

        console.log(formOptions.settingFileTypesValues);

        var result = jQuery.inArray( type, formOptions.settingFileTypesValues );

        if(result !== -1){
            __removeErrorClass(field, parent);
            __removeMessage(messageBlock);
            return true;
        }

        __addErrorClass(field, parent);
        __addMessage(messageBlock, formOptions.textFileTypeError );
        return false;

    };

    var __isPhoneField = function (field) {

        if( field.attr( "name" ) !== 'phone' ){
            return false;
        }
        return true;
    };

    var __isEmailField = function (field) {

        if( field.attr( "name" ) !== 'email' ){
            return false;
        }
        return true;
    };

    var __isFieldRequired = function (parent) {

        if(!parent){
            return false;
        }

        var isRequired = parent.hasClass(formOptions.fieldRequiredClass);

        return isRequired;

    };

    var __isFieldEmpty = function (value) {

        if (value.trim().length === 0){
            return true;
        }
        return false;
    };

    var __stripTags = function (field) {

        var value = field.val();
        if(value.length > 0 ){
            var regex = /<\/?[^>]+>/gi;
            var result = value.replace(regex, "");

            if(result){
                field.val(result);
            }

            return result;
        }

        return value;

    };

    var __addMessage = function (messageBlock, message) {

        if(!messageBlock){
            return false;
        }

        messageBlock.html(message);

        if(messageBlock.hasClass(formOptions.messageBlockHidden)){
            messageBlock.removeClass(formOptions.messageBlockHidden);
        }

        return true;

    };

    var __removeMessage = function (messageBlock) {

        if(!messageBlock){
            return false;
        }

        messageBlock.empty();

    };

    var __removeErrorClass = function (field, parent) {

        if(!parent || !field){
            return false;
        }

        parent.addClass(formOptions.parentValidClass).removeClass(formOptions.parentErrorClass);
        field.addClass(formOptions.fieldValidClass).removeClass(formOptions.fieldErrorClass);

        return true;

    };

    var __addErrorClass = function ( field, parent ) {

        if(!parent || !field){
            return false;
        }

        parent.removeClass(formOptions.parentValidClass).addClass(formOptions.parentErrorClass);
        field.removeClass(formOptions.fieldValidClass).addClass(formOptions.fieldErrorClass);

        return true;


    };

    $(document).on('click', '.js-contact-button', function (e) {

        e.preventDefault();
        var form = $(this).parents('.js-contact-form');

        if(form.length > 0){
            initFormHandler(form);
        }

    });

    initFormOptionsDB();
    initFieldsChecker();



})(jQuery);