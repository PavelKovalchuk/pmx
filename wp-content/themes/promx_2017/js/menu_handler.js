//В этом фрагменте ваш код будет выполнен, когда страница полностью загрузится.
jQuery(document).ready(function($){
// Add your custom jQuery here

    var initMenuHandler = function (menu){

        var options = {
            'menuItemPage' : 'data-page-id',
            'menuItemPageShort' : 'page-id',
            'pagesIdMap' : {},
            'pagesIdAll' : [],

            //CSS
            'mainMenuContainerClass': '.js-top-menu',
            'valid': 'valid'
        };

        var initMenuItems = function (menu){

            console.log('initMenuItems: ', menu);

            var container = $(options.mainMenuContainerClass);

            var mainLiData = $(container).children('li' + '[' + options.menuItemPage + ']');

            console.log('mainLiData: ', mainLiData);

            $.each( mainLiData, function( key, li ) {
                var pageId = $(this).data(options.menuItemPageShort);
                options.pagesIdMap[pageId] = [];
                options.pagesIdAll.push(pageId);

                //Second level
                var childrenPages = $(this).find('li' + '[' + options.menuItemPage + ']');
                $.each( childrenPages, function( key, li ) {

                    var childrenPageId = $(this).data(options.menuItemPageShort);
                    options.pagesIdMap[pageId].push(childrenPageId);

                    options.pagesIdAll.push(childrenPageId);

                });

            });

            var isMenuFull =  __checkObjectLength(options.pagesIdMap);
            console.log('isMenuFull: ', isMenuFull);

            if(isMenuFull && options.pagesIdAll.length > 0){

                var data = {
                    action: 'ajax_menu',
                    pagesMap: JSON.stringify(options.pagesIdMap),
                    pagesId: JSON.stringify(options.pagesIdAll)

                };

                __performSend(data);
            }

            console.log('pagesIdMap: ', options.pagesIdMap);

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

                    console.log(response);

                    if(!__isJSON(response)){
                        console.log('NOT JSON');
                        return false;
                    }

                    console.log('YES JSON');

                    if(response.status == 'ok'){

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