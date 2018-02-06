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
            'currentParentLi' : false,

            //HTML
            'linkText' : 'Read more',

            //CSS
            'mainMenuContainerClass': '.js-top-menu',
            'navbarClass': '.navbar-promx',
            'parentContainerClass': 'menu-blocks-container',
            'currentParentLiVisible': 'current-parent-visible',
            'subMenuContainerClass': 'menu-page-container',
            'submenuContainerFirstId': 'menu-parent-item-',
            'visibleClass': 'flex-visible',
            'hiddenClass': 'hidden'
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

                options.parentsLi.push(children);

                $(children).find('ul').remove();

            });

            __setEvents();

        };

        var __setEvents = function () {

            var header = $('header');

            header.on('mouseleave', function(){

                $('.' + options.subMenuContainerClass + options.visibleClass).removeClass(options.visibleClass).addClass(options.hiddenClass);

            });

            $.each( options.parentsLi, function(key,parent) {

                var parentLi = $(parent);
                var dataId = parentLi.data(options.menuItemPageShort);
                var submenu = $('.' + options.parentContainerClass + ' ' + '#' + options.submenuContainerFirstId + dataId);

                parentLi.on('mouseover', function(){

                    $('.' + options.subMenuContainerClass + '.' + options.visibleClass).removeClass(options.visibleClass).addClass(options.hiddenClass);
                    submenu.removeClass(options.hiddenClass).addClass(options.visibleClass);

                    if(options.currentParentLi != false){
                        $(options.currentParentLi).removeClass(options.currentParentLiVisible);
                    }

                    options.currentParentLi = parentLi;
                    parentLi.addClass(options.currentParentLiVisible);

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