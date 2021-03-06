var Products = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        $(document).ready(function(){
            var galleries = $('#gallery').adGallery({
                width : 960,
                display_next_and_prev : false,
                loader_image: 'images/loader.gif'
            });
        });
    };

    this.popup = function(ref){
        openPopup(baseURI+'products/showcontent/'+ref,{
            width  : 680,
            height : 500,
            center : true,
            scrollbars : true
        });
    };

    /* PRIVATE PROPERTIES
     **************************************************************************/

    /* PRIVATE METHODS
     **************************************************************************/

})();
