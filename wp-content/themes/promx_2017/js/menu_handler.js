//В этом фрагменте ваш код будет выполнен, когда страница полностью загрузится.
jQuery(document).ready(function($){
// Add your custom jQuery here

    var initMenuHandler = function (menu){

        var options = {
            'menuItemPage' : 'data-page-id',
            'menuItemPageShort' : 'page-id',
            'pagesIdMap' : {},
            'pagesIdAll' : [],
            'menuObject' : {},
            'parentsLi' : [],

            //HTML
            'linkText' : 'Read more',

            //CSS
            'mainMenuContainerClass': '.js-top-menu',
            'navbarClass': '.navbar-promx'
        };

        var initMenuItems = function (menu){

            options.menuObject = menu;

            //console.log('initMenuItems: ', menu);

            var container = $(options.mainMenuContainerClass);

            var mainLiData = $(container).children('li' + '[' + options.menuItemPage + ']');

            __removeOldSubmenuMenu(mainLiData);



        };


        var __removeOldSubmenuMenu = function (mainLiData) {

            $.each( mainLiData, function( parent, children ) {

                if ($.isEmptyObject(children))
                {
                    return;
                }

                //var parentLi = $(options.menuObject).find('li' + '[' + options.menuItemPage + '=' + parent + ']');

                options.parentsLi.push(children);

                $(children).find('ul').remove();

                //console.log('parentLi: ', parentLi);
            });

            __setEvents();

        };

        var __setEvents = function () {

            var header = $('header');

            header.on('mouseleave', function(){

                //$('.menu-page-container.flex-visible').removeClass('flex-visible').addClass('hidden');

            });

            $.each( options.parentsLi, function(key,parent) {

                var parentLi = $(parent);
                var dataId = parentLi.data(options.menuItemPageShort);

                var submenu = $('.menu-blocks-container #menu-parent-item-' + dataId);

                parentLi.on('mouseover', function(){

                    $('.menu-page-container.flex-visible').removeClass('flex-visible').addClass('hidden');
                    submenu.removeClass('hidden').addClass('flex-visible');

                });

            });

        };

        var __isJSON = function (json) {
            try
            {
                var json = JSON.parse(json);
                return true
            }
            catch(e)
            {
                return false;
            }
        };

        var __checkObjectLength = function (obj) {

            for(var prop in obj) {
                if (obj.hasOwnProperty(prop)) {
                    return true;
                }
            }

        };

        initMenuItems(menu);

    };

    var menu = $('#promx-nav');

    if(menu.length > 0){
        initMenuHandler(menu);
    }



});

//Если нужно, чтобы код был выполнен сразу (без ожидания события «ready» в DOM)
(function($) {



})(jQuery);