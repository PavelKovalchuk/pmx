//В этом фрагменте ваш код будет выполнен, когда страница полностью загрузится.
jQuery(document).ready(function($){
// Add your custom jQuery here

    var options = {
        'menuItemPage' : 'data-page-id',
        'menuItemPageShort' : 'page-id',
        'parentsLi' : [],
        'currentParentLi' : false,

        //CSS
        'mainMenuContainerClass': '.js-top-menu',
        'parentContainerClass': 'menu-blocks-container',
        'currentParentLiVisible': 'current-parent-visible',
        'subMenuContainerClass': 'menu-page-container',
        'submenuContainerFirstId': 'menu-parent-item-',
        'visibleClass': 'flex-visible',
        'hiddenClass': 'hidden',

        //Mobile
        'mobileLinkForbidden': 'link-forbidden',
        'mobileToggler': 'js-toggler',
        'mobileTogglerCloserClass': 'status-closer',
        'mobileDropdownMenuClass': 'dropdown-menu',
        'mobileShowDropdownSubmenuClass': 'show-dropdown-submenu'
    };

    var initMenuHandler = function (options){

        var options = options;

        var initMenuItems = function (){

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

            });

            __setEvents();

        };

        var __closeVisibleMenu = function () {

            var header = $('header');
            var visibleMenuContainer = '.' + options.subMenuContainerClass + '.' + options.visibleClass;

            header.on('mouseleave', function(){

                $(visibleMenuContainer).removeClass(options.visibleClass).addClass(options.hiddenClass);
                if(options.currentParentLi){
                    options.currentParentLi.removeClass(options.currentParentLiVisible);
                }

            });
        };

        var __showVisibleMenu = function () {

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

        var __setEvents = function () {

            __closeVisibleMenu();

            __showVisibleMenu();
        };

        /*var __isJSON = function (json) {
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

        };*/

        initMenuItems();

    };

    var initMobileMenuHandler = function (options){

        var options = options;

        var initMenuItems = function (){

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

            __initMenuAccordion();

        };

        var __initMenuAccordion = function () {

            var allLi = $('.menu-item-has-children');

            allLi.click(function(e) {
                //e.preventDefault();
                e.stopPropagation();

                var $this = $(this);

                if ($this.children('.dropdown-menu').hasClass('show-dropdown-submenu')) {
                    //$this.children('.dropdown-menu').removeClass('show-dropdown-submenu');
                    //$this.children('.dropdown-menu').slideUp(350);
                } else {

                    $this.parent().parent().find('li .' + options.mobileDropdownMenuClass).removeClass(options.mobileShowDropdownSubmenuClass);
                    $this.parent().parent().find('li .' + options.mobileDropdownMenuClass).slideUp(350);

                    $this.children('.' + options.mobileDropdownMenuClass).toggleClass(options.mobileShowDropdownSubmenuClass);
                    $this.children('.' + options.mobileDropdownMenuClass).slideToggle(350);
                }

                if( $this.hasClass(options.mobileLinkForbidden) ){

                    $this.removeClass(options.mobileLinkForbidden);

                }else{
                    console.log('Forbidden: ');
                    e.preventDefault();
                    $this.addClass(options.mobileLinkForbidden);

                }

                //If this is a high level li element
                if($this.hasClass('dropdown-submenu-li-level-0')){

                    if(options.currentParentLi != false ){
                        $(options.currentParentLi).removeClass(options.mobileLinkForbidden);
                    }

                    options.currentParentLi = $this;
                }

            });

        };

        var __initToggler = function () {

            var btn = $('#' + options.mobileToggler);
            var container = $(options.mainMenuContainerClass);

            btn.on('click', function(e){

                btn.toggleClass(options.mobileTogglerCloserClass);

                container.toggleClass('animateMobileMenu');

            });

        };

        initMenuItems();

     };


    // Optimalisation: Store the references outside the event handler:
    var $window = $(window);
    var menu = $('#promx-nav');
    var currentTypeMenu = '';

    var loadMenu = function() {

        var windowsize = $window.width();

        if(!menu.length > 0){
            return;
        }

        if (windowsize > 991) {

            if(currentTypeMenu != 'desktop' || currentTypeMenu == ''){
                currentTypeMenu = 'desktop';
                initMenuHandler(options);
            }

        }else {

            if(currentTypeMenu != 'mobile' || currentTypeMenu == ''){
                currentTypeMenu = 'mobile';
                initMobileMenuHandler(options);
            }

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