(function($) {

    var initFormHandler = function (form){

        var options = {
            //NEW
            'mainAction': 'promx_form',

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

            var forms_data = form.serialize();

            //console.log('forms_data', forms_data);
            //console.log('SiteParams.ajaxurl', SiteParams.ajaxurl);


            var data = {
                action: options.mainAction,
                forms_data: forms_data
            };

            __performSend(data, form);

        };

        var __performSend = function(data, form){

            jQuery.ajax({
                url: SiteParams.ajaxurl,
                async: true,
                data: data,
                type: 'POST',
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

    $(document).on('click', '.js-contact-button', function (e) {

        e.preventDefault();
        var form = $(this).parents('.js-contact-form');

        if(form.length > 0){
            initFormHandler(form);
        }

    });



})(jQuery);