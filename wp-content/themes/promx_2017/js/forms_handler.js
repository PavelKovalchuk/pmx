(function($) {

    var initFormHandler = function (form){

        var options = {
            //NEW
            'mainAction': 'promx_form',

            //Upload file data
            'uploaderClass': 'js-upload-file',
            'uploader': {},
            'uploadedFile': {},

        };

        var initSendEvent = function (form){

            initFormsChecker(form);

            console.log('formOptions.isFormValid', formOptions.isFormValid);

            if(!formOptions.isFormValid){
                return false;
            }

            var uploadedFile = false;
            if(__isUploadNeeded()){
                var uploadedFile = __uploadFile();
            }

            var formsData = form.serialize();

            //console.log('forms_data', forms_data);
            //console.log('SiteParams.ajaxurl', SiteParams.ajaxurl);
            console.log('uploadedFile', uploadedFile);

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

            return fileData;

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
        'textFileSizeError' : false,

        'settingFileTypesValues' : false,
        'settingFileTypesLabels' : false,
        'settingFileSize' : false,

        //Form data
        'isFormValid': true,
        'mainButton' : false,

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

            var fileSizeError = SiteParams.FormsMessages['max_file_size_error_' + formOptions.currentLangCode];
            if(fileSizeError.length > 0){
                formOptions.textFileSizeError = fileSizeError;
            }

        }

        //Init forms settings
        if(SiteParams.FormsSettings){

            var availableTypesValues = SiteParams.FormsSettings['available_file_formats_values'];
            if(availableTypesValues.length > 0){
                formOptions.settingFileTypesValues = availableTypesValues.split(',');
            }

            var maxFileSize = SiteParams.FormsSettings['available_file_max_size'];
            if(maxFileSize.length > 0){
                formOptions.settingFileSize = maxFileSize;
            }

        }

    };


    //Online checking form
    var initFormsChecker = function (form) {

        var initForms = function () {

            //Get all forms
            var forms =  $('form' + '.' + formOptions.formClass);

            if(forms.length > 0){

                $.each( forms, function( key, form ) {

                    initFieldsChecker(form);

                });

            }

        };

        var initFieldsChecker = function (form) {

            if(!form.length > 0){
                return false;
            }

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
                    var textsResult = checkInputField($_this);

                    if(!textsResult){
                        formOptions.isFormValid = false;
                    }
                }

                if( isInput && isInputFile){
                    var fileResult = checkInputFileField($_this);
                    if(!fileResult){
                        formOptions.isFormValid = false;
                    }
                }

                if(isSelect){
                    var selectResult = checkSelectField($_this);
                    if(!selectResult){
                        formOptions.isFormValid = false;
                    }
                }

            });
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

                return true;

            });

        };

        var checkInputField = function (field) {

            //console.log('formOptions.mainButton',  formOptions.mainButton);

            var parent = field.parent();
            var messageBlock = field.siblings('.' + formOptions.messageBlockClass);

            var doChecking = function () {

                var value = __stripTags(field);
                var isCheckedRequired = checkRequired(field, value, parent, messageBlock);

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

                return true;
            };

            field.on('input focusout', function () {

                doChecking();

            });

            /*formOptions.mainButton.on('click', function () {

                doChecking();

            });*/

        };

        var checkInputFileField = function (field) {

            var parent = field.parent();
            var messageBlock = field.siblings('.' + formOptions.messageBlockClass);

            field.on('change', function () {

                var file = field.prop('files')[0];

                if(!file){
                    return;
                }

                var value = file.name;
                var type = file.type;
                var size = file.size;

                var isCheckedRequired = checkRequired(field, value, parent, messageBlock);

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

                var isValidFileSize = checkFileSize(field, size, parent, messageBlock);
                if(isValidFileSize === false){
                    return;
                }

                return true;

            });

        };

        if(!form){
            initForms();
        }else{
            initFieldsChecker(form);
        }


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

    var checkFileSize = function (field, size, parent, messageBlock) {

        if(!size){
            return false;
        }

        var maxsize = formOptions.settingFileSize * 1024 * 1024;

        if(maxsize > size){
            __removeErrorClass(field, parent);
            __removeMessage(messageBlock);
            return true;
        }

        __addErrorClass(field, parent);
        __addMessage(messageBlock, formOptions.textFileSizeError + ' ' + formOptions.settingFileSize + 'MB' );
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
            //formOptions.mainButton = this;
            initFormHandler(form);
        }

    });

    initFormOptionsDB();
    initFormsChecker();



})(jQuery);