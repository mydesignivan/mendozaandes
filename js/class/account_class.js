var Account = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        var o = $.extend(true, {
            rules : {
                txtName: 'required',
                txtEmail: {
                   required: true,
                   email: true
                },
                txtMessage: 'required'
            },
            invalidHandler : function(){
                Loader.hide('#form1');
            }

        }, jQueryValidatorOptDef);
        $('#form1').submit(function(){Loader.show('#form1');}).validate(o);
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/


    /* PRIVATE METHODS
     **************************************************************************/
     var Loader = {
         show : function(sel){
             var f = $(sel);
             f.find('img.jq-loading').show();
             f.find('.jq-submit')[0].disabled=true;
         },
         hide : function(sel){
             var f = $(sel);
             f.find('img.jq-loading').hide();
             f.find('.jq-submit')[0].disabled=false;
         }
     };

})();
