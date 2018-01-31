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

            //console.log('mainLiData: ', mainLiData);

            $.each( mainLiData, function( key, li ) {
                var pageId = $(this).data(options.menuItemPageShort);
                options.pagesIdMap[pageId] = [];
                //options.pagesIdAll.push(pageId);

                //Second level
                var childrenPages = $(this).find('li' + '[' + options.menuItemPage + ']');
                $.each( childrenPages, function( key, li ) {

                    var childrenPageId = $(this).data(options.menuItemPageShort);
                    options.pagesIdMap[pageId].push(childrenPageId);

                    options.pagesIdAll.push(childrenPageId);

                });

            });

            var isMenuFull =  __checkObjectLength(options.pagesIdMap);

            if(isMenuFull && options.pagesIdAll.length > 0){

                var data = {
                    action: 'ajax_menu',
                    pagesMap: JSON.stringify(options.pagesIdMap),
                    pagesId: JSON.stringify(options.pagesIdAll)

                };

                __performSend(data);
            }

            console.log('pagesIdMap: ', options.pagesIdMap);
            console.log('pagesId: ', options.pagesIdAll);

        };

        var __fillPagesMap = function (pagesData) {

            /*if(!Array.isArray(data)){
                return false;
            }*/
            var response = {};

            $.each( options.pagesIdMap, function( parent, children ) {
                response[parent] = {};
                $.each( children, function(key,child) {

                    if (pagesData.hasOwnProperty(child)) {

                        response[parent][child] = pagesData[child];

                    }

                });

            });

            return response;

        };

        var __fillMenu = function (menuData) {

            var parentNewPages = '';

            var mainContainer = $(options.navbarClass);

            $.each( menuData, function( parent, children ) {

                if ($.isEmptyObject(children))
                {
                    return;
                }

                var parentLi = $(options.menuObject).find('li' + '[' + options.menuItemPage + '=' + parent + ']');

                options.parentsLi.push(parentLi);
                parentLi.find('ul').remove();

                var container = '<div class="menu-page-container hidden" id="menu-page-container-' + parent + '">';

                $.each( children, function(pageId,pageData) {

                    var childLi = $(parentLi).find('li' + '[' + options.menuItemPage + '=' + pageId + ']');

                    var link = '<a href="' + $(childLi).children('a').attr('href') +
                        '" class="menu-item-link">' + options.linkText + '</a>';

                    var image = '<img src="' + pageData.attached_file + '" class="menu-item-image">';

                    var text = '<p>' + pageData.excerpt + '</p>'

                    //childLi.append(image);
                    //childLi.append(link);

                    container += link + image + text;

                });

                container += '</div>';

                mainContainer.append(container);

            });

            __setEvents();

        };

        var __setEvents = function () {

            $.each( options.parentsLi, function(key,parent) {

                var dataId = parent.data(options.menuItemPageShort);

                var submenu = $('#menu-page-container-' + dataId);



                parent.on('mouseover', function(){


                    $('.menu-page-container.visible').removeClass('visible').addClass('hidden');
                    submenu.removeClass('hidden').addClass('visible');
                    console.log('Hi!');
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

        var __performSend = function(data){

            jQuery.ajax({
                url: SiteParams.ajaxurl,
                async: true,
                data: data,
                type: 'POST',
                success: function(response){

                    //console.log(response);

                    if(!__isJSON(response)){
                        console.log('NOT JSON');
                        return false;
                    }

                    var data = JSON.parse(response);
                    console.log('data: ', data);


                    //data.pages !== null && typeof data.pages === 'object'
                    if(__checkObjectLength(data.pages)){

                       var menuData =  __fillPagesMap(data.pages);

                        console.log('menuData: ', menuData);

                        __fillMenu(menuData);



                    }

                }
            });

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