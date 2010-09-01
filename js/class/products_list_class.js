var Products = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
    };

    this.del = function(id){
        if( confirm('¿Confirma la eliminación?') ){
            location.href = baseURI+'panel/products/delete/'+id;
        }    
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/

    /* PRIVATE METHODS
     **************************************************************************/

})();
