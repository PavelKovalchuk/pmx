(function($) {

    var initFormHandler = function (form){

        var options = {
            //NEW
            'mainAction': 'promx_form',

            //Upload file data
            'uploaderClass': 'js-upload-file',
            'uploader': {},

        };

        var initSendEvent = function (form){

            initFormsChecker(form, true);

            console.log('formOptions.isFormValid', formOptions.isFormValid);
            if(!formOptions.isFormValid){
                //Return initial state
                formOptions.isFormValid = true;
                return false;
            }

            var uploadedFile = false;
            if(__isUploadNeeded()){
                var uploadedFile = __uploadFile();
            }

            var formsData = form.serialize();

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
        'fieldRequiredClass': 'required',
        'radioGroupClass': 'js-radio-group',


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
    //var force - checking without event
    var initFormsChecker = function (form, force) {

        var force = (force) ? force : false;

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

            //Holder for radio/ If checked the name of fileld will be here
            var radioHolder = {};

            var fieldsToCheck = $(form).find('.' + formOptions.fieldClass);

            $.each( fieldsToCheck, function( key, field ) {

                var $_this = $(this);
                var isInput = $_this.is("input");
                var isInputFile = ( $_this.attr( "type" ) == 'file' ) ? true : false;
                var isTextarea = $_this.is("textarea");
                var isSelect = $_this.is("select");
                var isRadio = ( $_this.attr( "type" ) == 'radio' ) ? true : false;

                //Chossing the type of the field and Checker START
                if( (isInput || isTextarea) && !isInputFile){
                    var textsResult = checkInputField($_this, force);

                    if(textsResult == false){
                        formOptions.isFormValid = false;
                    }
                }

                if( isInput && isInputFile){
                    var fileResult = checkInputFileField($_this, force);
                    if(fileResult == false){
                        formOptions.isFormValid = false;
                    }
                }

                if(isSelect){
                    var selectResult = checkSelectField($_this, force);
                    if(selectResult == false){
                        formOptions.isFormValid = false;
                    }
                }

                if(isRadio){

                    var radioName = $_this.attr( "name" );

                    var radioResult = checkRadioField($_this, force);
                    if(radioResult == false && typeof radioHolder[radioName] == 'undefined'){
                        formOptions.isFormValid = false;
                    }else if(radioResult == true){
                        radioHolder[radioName] = true;
                        formOptions.isFormValid = true;
                    }

                }

                //Chossing the type of the field and Checker FINISH

            });
        };

        var checkSelectField = function (field, force) {

            var parent = field.parent();
            var messageBlock = field.siblings('.' + formOptions.messageBlockClass);
            var doChecking = function () {

                var value = __stripTags(field);

                var isCheckedRequired = checkRequired(field, value, parent, messageBlock);

                if(isCheckedRequired === false){
                    return false;
                }

                var isEmpty = __isFieldEmpty(value);
                if(isEmpty){
                    __removeErrorClass(field, parent);
                    __removeMessage(messageBlock);
                }

                var isValidMaxLength = checkMaxLength(field, value, parent, messageBlock);
                if(isValidMaxLength === false){
                    return false;
                }

                return true;

            };

            //Checking without events on fields
            if(force){
                var checkResult =  doChecking();
                return checkResult;
            }

            //Checking on events on fields
            field.on('change', function () {

                doChecking();

            });

        };

        var checkRadioField = function (field, force) {

            var parent = field.parent();
            var messageBlock = field.siblings('.' + formOptions.messageBlockClass);
            var fieldName = field.attr('name');

            var backToInitState = function () {

                var parent = field.parents('.' + formOptions.radioGroupClass);
                var siblings = parent.find('[name = ' + fieldName + ']');
                //console.log('siblings : ', siblings);
                $.each( siblings, function( key, sibling ) {
                    var $this_sibling = $(sibling);
                    var siblingParent = $($this_sibling).parent();
                    var siblingMessageBlock = $($this_sibling).siblings('.' + formOptions.messageBlockClass);

                    __removeErrorClass($this_sibling, siblingParent);
                    __removeMessage(siblingMessageBlock);
                });

                return true;

            };

            var doChecking = function () {

                var value = __stripTags(field);

                var isCheckedRequired = checkRequiredRadio(field, value, parent, messageBlock);
                if(isCheckedRequired === false){
                    return false;
                }

                var isEmpty = __isFieldEmpty(value);
                if(isEmpty){
                    __addErrorClass(field, parent);
                    __addMessage(messageBlock, formOptions.textRequired);
                    return false;
                }

                var isValidMaxLength = checkMaxLength(field, value, parent, messageBlock);
                if(isValidMaxLength === false){
                    return false;
                }
                backToInitState();
                return true;

            };

            //Checking without events on fields
            if(force){
                var checkResult =  doChecking();
                return checkResult;
            }

            //Checking on events on fields
            field.on('change', function () {
                var checkResultOnChange =  doChecking();
                if(checkResultOnChange == true){
                    backToInitState();
                }

            });

        };

        var checkInputField = function (field, force) {

            var parent = field.parent();
            var messageBlock = field.siblings('.' + formOptions.messageBlockClass);

            var doChecking = function () {

                var value = __stripTags(field);
                var isCheckedRequired = checkRequired(field, value, parent, messageBlock);

                if(isCheckedRequired === false){
                    return false;
                }

                var isEmpty = __isFieldEmpty(value);
                if(isEmpty){
                    __removeErrorClass(field, parent);
                    __removeMessage(messageBlock);
                }


                var isValidEmail = checkEmail(field, value, parent, messageBlock);
                if(isValidEmail === false){
                    return false;
                }

                var isValidPhone = checkPhone(field, value, parent, messageBlock);
                if(isValidPhone === false){
                    return false;
                }

                var isValidMaxLength = checkMaxLength(field, value, parent, messageBlock);
                if(isValidMaxLength === false){
                    return false;
                }

                return true;
            };

            //Checking without events on fields
            if(force){
                var checkResult =  doChecking();
                return checkResult;
            }

            //Checking on events on fields
            field.on('input focusout', function () {

                doChecking();

            });

        };

        var checkInputFileField = function (field, force) {

            var parent = field.parent();
            var messageBlock = field.siblings('.' + formOptions.messageBlockClass);

            var doChecking = function () {

                var file = field.prop('files')[0];

                var value = (file) ? file.name : false;
                var type = (file) ? file.type : false;
                var size = (file) ? file.size : false;

                var isCheckedRequired = checkRequired(field, value, parent, messageBlock);

                if(isCheckedRequired === false){
                    return false;
                }

                var isEmpty = __isFieldEmpty(value);
                if(isEmpty){
                    __removeErrorClass(field, parent);
                    __removeMessage(messageBlock);
                }

                var isValidMaxLength = checkMaxLength(field, value, parent, messageBlock);
                if(isValidMaxLength === false){
                    return false;
                }

                var isValidFileType = checkFileType(field, type, parent, messageBlock);
                if(isValidFileType === false){
                    return false;
                }

                var isValidFileSize = checkFileSize(field, size, parent, messageBlock);
                if(isValidFileSize === false){
                    return false;
                }

                return true;

            };

            //Checking without events on fields
            if(force){
                var checkResult =  doChecking();
                return checkResult;
            }

            //Checking on events on fields
            field.on('change', function () {

                doChecking();

            });

        };

        if(!form){
            initForms();
        }else{
            initFieldsChecker(form);
        }


    };

    var checkRequiredRadio = function (field, value, parent, messageBlock) {

        var isRequired = __isFieldRequired(parent);

        if(isRequired){

            var isCheckedRadio = field.prop("checked");
            if(isCheckedRadio){
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

        if(!value){
            return true;
        }

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