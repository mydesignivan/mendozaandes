var Products = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        var list = $('tbody.sortable');

        if( list.length>0 ){

            list.sortable({
                stop : function(){
                    _working = true;
                    list.sortable( "option", "disabled", true );
                    $('tbody.sortable tr:even').css('background-color', '#F7F0E3');
                    $('tbody.sortable tr:odd').css('background-color', '#E9D4B0');
                    
                    var initorder = $(this).find('tr:first').attr('id').substr(2);

                    var arr = $(this).sortable("toArray");

                    var callback = function(){
                        list.sortable( "option", "disabled", false );
                    };

                    _save_order(arr, initorder, callback);
                },
                handle : '.handle'
            }).disableSelection();
        }
    };

    this.del = function(id){
        if( confirm('¿Confirma la eliminación?') ){
            location.href = baseURI+'panel/products/delete/'+id;
        }    
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _working=false;

    /* PRIVATE METHODS
     **************************************************************************/
    var _save_order = function(arr, initorder, callback){
        $.post(baseURI+'panel/products/ajax_order/', {rows : JSON.encode(arr), initorder : initorder}, function(data){
            _working = false;
            if( data!="success" ) alert('ERROR AJAX:\n\n'+data);
            else {
                if( typeof(callback)=="function" ) callback();
            }
        });
    };

})();
