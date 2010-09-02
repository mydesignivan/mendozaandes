var Products = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(mode_edit){

        // Configura el Validador
        var rules={};
        rules.txtName = {
            required : true,
            remote : {
                url  : baseURI+'panel/products/ajax_check_exists/',
                type : "post",
                data : {txtName:$('#txtName').val(), id:$('#products_id').val()},
                complete : function(){
                    $('#txtName').focus();
                }
            }
        };
        rules.txtDescription = 'required';

        if( !mode_edit ) rules.txtImage = 'required';

        var o = $.extend({}, jQueryValidatorOptDef, {
            rules : rules,
            submitHandler : _on_submit,
            invalidHandler : function(){
                _Loader.hide('#form1');
            }
        });
        $('#form1').validate(o);

        // Configura el editor
        TinyMCE_init.width = '300px';
        TinyMCE_init.height = '250px';
        tinyMCE.init(TinyMCE_init);

        // ESTO ES PARA LA GALERIA DE IMAGEN
        PictureGallery.initializer({
            sel_input      : '#txtUploadFile',
            sel_button     : '#btnUpload',
            sel_ajaxloader : '#ajax-loader1',
            sel_gallery    : '#gallery-image',
            sel_msgerror   : '#pg-msgerror',
            action         : baseURI+'panel/products/ajax_upload_gallery',
            href_remove    : baseURI+'panel/products/ajax_upload_delete',
            callback       : function(){
                $('a.jq-image').fancybox();
            }
        });

        $("#gallery-image").sortable({
                                stop : function(){
                                    $('a.jq-image').fancybox();
                                },
                                revert: true,
                                handle : '.handle'
                           }).disableSelection();
        // ----

        // ESTO ES PARA EL UPLOAD SIMPLE
        $('#ajaxupload-form iframe').load(function(){
            if( this.src=="about:blank" ) return false;

            var content = this.contentDocument || this.contentWindow.document;
                content = content.body.innerHTML;

            var i = $('input.ajaxupload-input');
            i[0].disabled = false;
            $('#ajaxupload-load').hide();

            var result;
            try{
                eval('result = '+content);
            }catch(e){
                alert('ERROR:\n\n'+content);
                return false;
            }

            if( result['status']=="success" ) {
                var output = result['output'][0];

                $('#ajaxupload-thumb').attr('src', output['href_image_full'])
                                      .attr('alt', output['filename_image'])
                                      .attr('width', output['thumb_width'])
                                      .attr('height', output['thumb_height'])
                                      .show();

                _ajaxupload_output = output;
            }
            else $('#ajaxupload-error').html(result['error'][0]['message']).show();

            return false;
        });
        //-----


        // Configura Fancybox
        $('a.jq-image').fancybox();

    };

    this.upload = function(el){
        var ext = $(el).val().replace(/^([\W\w]*)\./gi, '').toLowerCase();
        
        if( !(ext && /^(jpg|png|jpeg|gif)$/.test(ext)) ){
            alert('Error: Solo se permiten imagenes');
            return false;
        }

        var inputclone = $(el).clone();

        el.disabled = true;
        $('#ajaxupload-load').show();
        $('#ajaxupload-form input:file').remove();
        $('#ajaxupload-form iframe').attr('src', '');
        $('#ajaxupload-form').append(inputclone).submit();

        return false;
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _ajaxupload_output=false;

    /* PRIVATE METHODS
     **************************************************************************/
     var _Loader = {
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

     var _on_submit = function(form){
        if( $('#gallery-image li').length==0 || $('#gallery-image').is(':hidden') ){
            $('#pg-msgerror').html('Debe ingresar al menos una im&aacute;gen').show();
            return false;
        }

        if( tinyMCE.get('txtContent').getContent().length==0 ){
            $('#msgbox1').show();
            return false;
        }
  
        _Loader.show('#form1');

        var data={};
        data.gallery={};
        data.gallery.images_new = PictureGallery.get_images_new();
        if( $('#products_id').val() ) {
            data.gallery.images_del = PictureGallery.get_images_del();
            data.gallery.images_order = PictureGallery.get_orders();
        }
        data.image_thumb = _ajaxupload_output;

        $('#json').val(JSON.encode(data));

        form.submit();
        return true;
     }

})();
