var PictureGallery = new (function(){

   /* CONSTRUCTOR
    **************************************************************************/
   this.initializer = function(_params){
       params = $.extend({}, {
           sel_input      : '',
           sel_button     : '',
           sel_ajaxloader : '',
           sel_gallery    : '',
           sel_msgerror   : '',
           action         : '',
           href_remove    : '',
           defined_size   : false,
           callback       : Function()
       }, _params);

       //Crea el form
       _form = $('<form action="'+params.action+'" method="post" enctype="multipart/form-data" target="picgalifr" style="border:1px solid red"></form>').hide();
       _iframe = $('<iframe id="picgalifr" name="picgalifr" src="about:blank"></iframe>').bind('load', _iframe_load);
       _form.append(_iframe);

       $('body').append(_form);

       $(params.sel_gallery+' li a.jq-removeimg').bind('click', _remove_image);
  };

  /* PUBLIC METHODS
   **************************************************************************/
   this.upluad = function(){
        var input = $(params.sel_input);
        var parent = input.parent();
        if( input.val() ){
            var ext = input.val().replace(/^([\W\w]*)\./gi, '').toLowerCase();

            if( !(ext && /^(jpg|png|jpeg|gif)$/.test(ext)) ){
                alert('Error: Solo se permiten imagenes');
                return false;
            }

            $(params.sel_button)[0].disabled=true;
            $(params.sel_ajaxloader).show();

            var inputclone = input.clone(true);

            _form.find(':file').remove();
            input.prependTo(_form);
            parent.prepend(inputclone);
            _form.submit();
        }
        return false;
   };

   this.get_images_new = function(){
       var data = new Array();
        $(params.sel_gallery + ' li').each(function(){
            var li = $(this);
            var tagA = li.find('a.jq-image');
            var tagImg = tagA.find('img');

            if( li.data('au-newimg') ){
                var newImg = new Image();
                newImg.src = tagImg.attr('src');

                data.push({
                    image_full  : _get_filename(tagA.attr('href')),
                    image_thumb : _get_filename(tagImg.attr('src')),
                    width       : newImg.width,
                    height      : newImg.height
                });
            }
        });
       return data;
   };

   this.get_images_del = function(){
       return array_images_del;
   };

   this.get_orders = function(){
       var data = new Array();
       var n = 0;
        $(params.sel_gallery + ' li').each(function(){
            n++;
            var li = $(this);
            data.push({
                image_full : _get_filename(li.find('a.jq-image').attr('href')),
                order      : n
            });
        });
        return data;
   };


   /* PRIVATE PROPERTIES
    **************************************************************************/
    var params;
    var array_images_del = new Array();
    var _form=false;
    var _iframe=false;

   /* PRIVATE METHODS
    **************************************************************************/
    var _iframe_load = function(){
        var content = this.contentDocument || this.contentWindow.document;
            content = content.body.innerHTML;

        if(content=='') return false;

        $(params.sel_button).show();
        $(params.sel_ajaxloader).hide();

        var data;
        try{
            eval('data = '+content);

        }catch(err){
            alert(content);
            return false;
        }

        if( data['status']=="success" ){
            $(params.sel_msgerror).hide();
            var ul = $(params.sel_gallery);
            var li = ul.find('li:first');

            if( ul.is(':visible') ) li = li.clone();

            var output = data['output'][0];

            li.find('a.jq-image').attr('href', output['href_image_full']);
            var img = li.find('img:first');
                img.attr('src', output['href_image_thumb']);

            if( !params.defined_size ){
                img.attr('width', output['thumb_width']).attr('height', output['thumb_height']);
            }else{
                img.attr('width', params.defined_size.width).attr('height', params.defined_size.height);
            }

            var audata = {width : output['thumb_width'], height : output['thumb_height']};

            if( !ul.is(':visible') ){
                //li.find('a.jq-removeimg').bind('click', _remove_image);
                li.data('au-data', audata);
                li.data('au-newimg', true);
                ul.show();
            }else{
                ul.find('li:last').after('<li>'+li.html()+'</li>');
                ul.find('li:last').find('a.jq-removeimg').bind('click', _remove_image);
                ul.find('li:last').data('au-data', audata);
                ul.find('li:last').data('au-newimg', true);
            }

            $(params.sel_input).val('');
            $(params.sel_button)[0].disabled=false;
            $(params.sel_ajaxloader).hide();
            params.callback();
           
        }else {
            var d=$(params.sel_msgerror);
            if( d.length>0 ) d.html(data['error'][0]['message']);
            else alert(data['error'][0]['message']);
        }

        return false;
    };

    var _get_filename = function(str){
        var arr = str.split('/');
        return arr[arr.length-1].toLowerCase();
    };

    var _remove_image = function(e){
        e.preventDefault();

        if( confirm('¿Está seguro de quitar la imágen?') ){
            var li = $(e.target).parent().parent();

            var remove = function(){
                var ul = $(params.sel_gallery);
                if( ul.find('li').length==1 ){
                    ul.hide();
                }else li.remove();
            };

            var tagA = li.find('a.jq-image');
            var tagImg = tagA.find('img');
            var image_full = tagA.attr('href');
            var image_thumb = tagImg.attr('src');

            if( li.data('au-newimg') ){

                $.post(params.href_remove, {au_filename_image : image_full, au_filename_thumb : image_thumb}, function(data){
                    if( data=="ok" ){
                        remove();

                    }else alert("ERROR DELETE:\n"+data);
                });
            }else{
                array_images_del.push({
                    image_full  : _get_filename(image_full),
                    image_thumb : _get_filename(image_thumb)
                });
                remove();
            }
        }
    };


})();