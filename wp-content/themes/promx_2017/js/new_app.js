//В этом фрагменте ваш код будет выполнен, когда страница полностью загрузится.
jQuery(document).ready(function($){
// Add your custom jQuery here


});

//Если нужно, чтобы код был выполнен сразу (без ожидания события «ready» в DOM)
(function($) {

    // внутри этой функции $ будет работать как jQuery

    langSwitcherInit();
    tooltipInit();
    cookieUsageInit();
    //dropdownMenuHoverInit();




    //Base functions area


    function cookieUsageInit() {

        //https://github.com/js-cookie/js-cookie
        var cookiesName = 'cookiesUsageInformed';
        var blockClass = '.session-block';
        var btnClass = '.session_btn';

        var result = Cookies.get(cookiesName);

        if ( result == undefined ){
            $(blockClass).show();
        } else {
            $(blockClass).hide();
        }

        $(document).on('click', btnClass, function(){

            Cookies.set(cookiesName, 'informed', { expires: 7 });
            $(blockClass).hide();

        });

    }

    function langSwitcherInit(){

        var switcher = $('.js-lang-switcher');
        var classShown = 'lang-shown';
        var classHidden = 'hidden fadeInUp';
        var secondBlock = $('.js-lang-other');

        switcher.bind( "mouseenter mouseleave", function(event) {

            event.stopPropagation();

            secondBlock.toggleClass( classHidden );
            switcher.toggleClass( classShown );

        });


    }

    function dropdownMenuHoverInit(){

        $('ul.nav li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });

    }

    function tooltipInit() {
        $('[data-toggle="tooltip"]').tooltip();
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