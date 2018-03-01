(function($) {

    var initShufflePlugin = function (shuffle_element){

        var Shuffle = window.Shuffle;
        var Container = shuffle_element;
        var sizer = $('.shuffle_sizer');
        var options = $('.js-filter-option');

        var btnMore = $('#js_more_posts');
        var btnMoreText = btnMore.text();

        var readMoreText = Container.data('read-more-text');
        var defaultImage = Container.data('default-thumbnail');
        var loadingText = Container.data('loading-text');

        // instantiate the plugin
        var shuffleInstance = new Shuffle(Container, {
            itemSelector: '.grid__brick',
            sizer: sizer // could also be a selector: '.my-sizer-element'
            ,useTransforms: true
        });


        // None of these need to be executed synchronously
        setTimeout(function() {
            //listen();
            eventMorePosts();
        }, 100);

        //Private method - gets JSON data and convert it to js array of html elemnts with html inside
        var __getArrayOfElementsToAdd = function(data){

            if(!data.length > 0){
                return false;
            }

            var response = [];

            data.forEach(function(el) {

                var block = document.createElement('div');
                block.className = el.classes;
                block.innerHTML = el.html;
                block.setAttribute("data-groups", '["' + el.data_groups + '"]');

                response.push(block);

            });

            return response;

        };


        var listen = function() {

            // Get all images inside shuffle
            /* Container.imagesLoaded()
                 .always( function( instance ) {
                     console.log('all images loaded');
                 })
                 .done( function( instance ) {
                     console.log('all images successfully loaded');
                 })
                 .fail( function() {
                     console.log('all images loaded, at least one is broken');
                 })
                 .progress( function( instance, image ) {
                     var result = image.isLoaded ? 'loaded' : 'broken';
                     console.log( 'image is ' + result + ' for ' + image.img.src );
                 });*/
        };


        //Listen for click - More posts, makes ajax call,insert result to DOM
        var eventMorePosts = function(){

            $(btnMore).on('click', function(event){

                var button = $(this),
                    data = {
                        'action': 'loadmore',
                        //'query': blog_loadmore_params.posts, // that's how we get params from wp_localize_script() function
                        'paged' : blog_loadmore_params.current_page,
                        'readMoreText' : readMoreText,
                        'defaultImage' : defaultImage
                    };

                $.ajax({
                    url : blog_loadmore_params.ajaxurl, // AJAX handler
                    data : data,
                    type : 'POST',
                    beforeSend : function ( xhr ) {
                        button.text(loadingText); // change the button text, you can also add a preloader image
                    },
                    success : function( data ){
                        if( data) {

                            //Check if it is valid JSON
                            try {
                                JSON.parse(data);
                            } catch (e) {
                                return false;
                            }


                            var response = JSON.parse(data);

                            //If is the last portion of posts - will nothing do
                            if (response.answer === 'end') {
                                button.remove();
                                return false;
                            }

                            //get new posts to be inserted
                            var newPosts = __getArrayOfElementsToAdd(response);

                            //insert new posts to Shuffle instance
                            newPosts.forEach(function (newEl) {
                                shuffleInstance.element.appendChild(newEl);
                            }, this);

                            /*Very important!
                            https://imagesloaded.desandro.com/
                            imagesLoaded object is in the main.js. so we can call for him.
                            When all images are downloaded we call shuffleInstance and tell him to update his items.
                            It is important for height of each post
                            imagesLoaded */
                            Container.imagesLoaded()
                                .always(function (instance) {
                                    console.log('all images loaded');

                                    shuffleInstance.add(newPosts);

                                    //Change text of the button
                                    button.text(btnMoreText);

                                });


                            //Parameter which tells us the current Paged of WordPress
                            blog_loadmore_params.current_page++;

                            //console.log(blog_loadmore_params.current_page);

                            if ( blog_loadmore_params.current_page == blog_loadmore_params.max_page ){
                                button.remove(); // if last page, remove the button
                            }

                        } else {
                            button.remove(); // if no data, remove the button as well
                        }
                    }
                });

            });

        };



        var eventFilter = function(){

            $(options).on('click', function(event){
                event.preventDefault();

                var $this = $(this),
                    isActive = $this.hasClass( 'active' ),
                    group = isActive ? 'all' : $this.data('group');

                // Hide current label, show current label in title
                if ( !isActive ) {
                    $('#sorter .js-filter-option').removeClass('active');

                }

                $this.toggleClass('active');

                shuffleInstance.filter(group);
            });

        };

        eventFilter();

        //eventMorePosts();


    };

    var shuffle_element = $('#shuffle_grid_container');

    if(shuffle_element.length > 0){
        initShufflePlugin(shuffle_element);
    }



})(jQuery);