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
        //NEW
        'formClass': 'js-contact-form',
        'fieldClass': 'js-contact-form-field',
        'parentErrorClass': 'form-parent-field-error',
        'parentValidClass': 'form-parent-field-valid',
        'fieldErrorClass': 'form-field-error',
        'fieldValidClass': 'form-field-valid'

    };


    //Online checking form
    var initFieldsChecker = function () {

        console.log('initFieldsChecker', formOptions.formClass);


        var initForms = function () {

            //Get all forms
            var forms =  $('form' + '.' + formOptions.formClass);

            if(forms.length > 0){

                $.each( forms, function( key, form ) {

                    var fieldsToCheck = $(form).find('.' + formOptions.fieldClass);

                    $.each( fieldsToCheck, function( key, field ) {

                        var $_this = $(this);
                        var isInput = $_this.is("input");
                        //console.log('isInput',  isInput);
                        if(isInput){
                            checkInputField($_this);
                        }

                    });

                    //console.log('fieldsToCheck',  fieldsToCheck);
                    //console.log('initForms form',  formOptions.formClass);

                });

            }

        };

        var checkInputField = function (field) {

            //console.log('checkField',  field);

            field.on('input focusout', function () {


                var parent = field.parent();
                var value = field.val();

                //console.log('checkInputField value',  value);
                //console.log('checkInputField parent',  parent);

                var isEmpty = __isFieldEmpty(value, parent);
                console.log('isEmpty',  isEmpty);
                if(isEmpty){
                    __addErrorClass(field, parent, true);
                    return;
                }

            });

        };

        initForms();

    };


    var __isFieldRequired = function (val, parent) {

        var isRequired = parent;

    };

    var __isFieldEmpty = function (val, parent) {

        if (val.trim().length === 0){
            return true;
        }

        return false;

    };

    var __addErrorClass = function (field, parent, isError ) {

        if(!parent || !field){
            return false;
        }


        if (isError ==  true) {
            parent.removeClass(formOptions.parentValidClass).addClass(formOptions.parentErrorClass);
            field.removeClass(formOptions.fieldValidClass).addClass(formOptions.fieldErrorClass);
            return true;
        } else {
            parent.addClass(formOptions.parentValidClass).removeClass(formOptions.parentErrorClass);
            field.addClass(formOptions.fieldValidClass).removeClass(formOptions.fieldErrorClass);
            return true;
        }
        return false;

    };

    $(document).on('click', '.js-contact-button', function (e) {

        e.preventDefault();
        var form = $(this).parents('.js-contact-form');

        if(form.length > 0){
            initFormHandler(form);
        }

    });

    initFieldsChecker();



})(jQuery);