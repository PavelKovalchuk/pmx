//В этом фрагменте ваш код будет выполнен, когда страница полностью загрузится.
jQuery(document).ready(function($){
// Add your custom jQuery here


});

//Если нужно, чтобы код был выполнен сразу (без ожидания события «ready» в DOM)
(function($) {

    // внутри этой функции $ будет работать как jQuery

    langSwitcherInit();
    //dropdownMenuHoverInit();




    //Base functions area



    function langSwitcherInit(){
        $('.lang-box.current-lang').on('click', function() {

            var classShow = 'lang-shown';
            var classHidden = 'hidden';
            var secondBlock = $('.js-lang-other');

            if(secondBlock.hasClass(classShow)){
                secondBlock.removeClass(classShow).addClass(classHidden);
                return;
            }

            secondBlock.removeClass(classHidden).addClass(classShow);

        });
    }

    function dropdownMenuHoverInit(){

        $('ul.nav li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });

    }

    /*function initWOW(){

        wow = new WOW(
            {
                boxClass:     'wow',      // default
                animateClass: 'animated', // default
                offset:       0,          // default
                mobile:       true,       // default
                live:         true        // default
            }
        );
        wow.init();

    }*/






})(jQuery);