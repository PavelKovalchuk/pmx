//В этом фрагменте ваш код будет выполнен, когда страница полностью загрузится.
jQuery(document).ready(function($){
// Add your custom jQuery here

    var options = {
        'menuItemPage' : 'data-page-id',
        'menuItemPageShort' : 'page-id',
        'pagesIdMap' : {},
        'pagesIdAll' : [],
        'menuObject' : {},
        'parentsLi' : [],
        'currentParentLi' : false,
        //'currentParentUl' : false,

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
        'hiddenClass': 'hidden',

        'mobileSubMenuClass': 'dropdown-menu',
        'mobileLinkForbidden': 'link-forbidden',
        'mobileSubmenuToggleClass': 'dropdown-toggle',
        'mobileToggler': 'js-toggler',
        'mobileHiddenClass': 'mobile-hidden',
        'mobileTogglerCloserClass': 'status-closer'
    };

    var initMenuHandler = function (menu, options){

        var options = options;

        var initMenuItems = function (menu){

            options.menuObject = menu;

            //console.log('initMenuItems: ', menu);

            var container = $(options.mainMenuContainerClass);

            var mainLiData = $(container).children('li' + '[' + options.menuItemPage + ']');

            __initParentsLiData(mainLiData);



        };


        var __initParentsLiData = function (mainLiData) {

            $.each( mainLiData, function( parent, children ) {

                if ($.isEmptyObject(children))
                {
                    return;
                }

                options.parentsLi.push(children);

                //$(children).find('ul').remove();

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

    var initMobileMenuHandler = function (menu){


        var initMenuItems = function (menu){

            options.menuObject = menu;

            //console.log('initMobileMenuHandler: ', 'Hello');

            var container = $(options.mainMenuContainerClass);

            var mainLiData = $(container).children('li' + '[' + options.menuItemPage + ']');

            __initParentsLiData(mainLiData);

            __initToggler();

        };

        var __initParentsLiData = function (mainLiData) {

            $.each( mainLiData, function( parent, children ) {

                if ($.isEmptyObject(children))
                {
                    return;
                }

                options.parentsLi.push(children);

            });

            //console.log('__initParentsLiData: ', options.parentsLi);

            __setEvents();

        };

        var __initToggler = function () {

            var btn = $('#' + options.mobileToggler);
            var container = $(options.mainMenuContainerClass);

            btn.on('click', function(e){

                btn.toggleClass(options.mobileTogglerCloserClass);

                //container.toggleClass(options.mobileHiddenClass);

                container.toggleClass('animateMobileMenu');

            });



        };

        var __setEvents = function () {

           /* var header = $('header');

            header.on('mouseleave', function(){

                $('.' + options.subMenuContainerClass + options.visibleClass).removeClass(options.visibleClass).addClass(options.hiddenClass);

            });*/


           var allLi = $('.menu-item-has-children');
            //$.each( options.parentsLi, function(key,parent) {
            $.each( options.parentsLi, function(key,parent) {

                var parentLi = $(parent);
                var parentLiLink = parentLi.find('a.' + options.mobileSubmenuToggleClass);

                var children = parentLi.children('ul');
                $.each( children, function(key,element) {
                    $(element).on('click', function(event){
                        event.stopPropagation();
                    });
                })


                parentLi.on('click', function(e){

                    //e.stopPropagation();

                    if(parentLiLink.length > 0){

                        if( parentLi.hasClass(options.mobileLinkForbidden) ){

                            parentLi.removeClass(options.mobileLinkForbidden);

                        }else{
                            console.log('Forbidden: ');
                            e.preventDefault();
                            parentLi.addClass(options.mobileLinkForbidden);

                        }
                    }

                    if(options.currentParentLi != false ){
                        $(options.currentParentLi).removeClass(options.mobileLinkForbidden);
                    }

                    options.currentParentLi = parentLi;

                });

            });

        };

        initMenuItems(menu);

     };


    // Optimalisation: Store the references outside the event handler:
    var $window = $(window);
    var menu = $('#promx-nav');

    var loadMenu = function() {

        var windowsize = $window.width();

        if(!menu.length > 0){
            return;
        }

        if (windowsize > 991) {

           initMenuHandler(menu, options);

        }else {

            initMobileMenuHandler(menu, options);

        }
    };

    // Execute on load
    loadMenu();



    // Bind event listener
    $(window).resize(loadMenu);



});

//Если нужно, чтобы код был выполнен сразу (без ожидания события «ready» в DOM)
(function($) {



})(jQuery);