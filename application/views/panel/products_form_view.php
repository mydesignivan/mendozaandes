<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status')=="success" ){?>
<div class="success">
    Los datos han sido guardados con &eacute;xito.
</div>
<?php }elseif( $this->session->flashdata('status')=="error" ){?>
<div class="error">
    Los datos no han podido ser guardados.
</div>
<?php }?>

<form id="form1" action="<?=site_url(isset($info) ? '/panel/products/edit/' : '/panel/products/create/')?>" method="post" enctype="application/x-www-form-urlencoded">
    <div class="trow">
        <label class="label label2" for="txtName"><span class="required">*</span>Nombre Producto</label>
        <input type="text" id="txtName" name="txtName" class="input-form" value="<?=@$info['products_name']?>" />
    </div>

    <div class="trow">
        <label class="label label2" for="txtDescription"><span class="required">*</span>Descripci&oacute;n</label>
        <input type="text" name="txtDescription" id="txtDescription" class="input-form" maxlength="255" value="<?=@$info['description']?>" />
    </div>

    <div class="trow">
        <label class="label label2" for="txtContent"><span class="required">*</span>Contenido</label>
        <div class="fleft">
            <textarea id="txtContent" name="txtContent" cols="5" rows="22" class="textarea-info"><?=@$info['content']?></textarea>
            <div id="msgbox1" class="clear error prepend-top hide" style="width:200px">El campo "Contenido" es obligatorio</div>
        </div>
    </div>

    <div class="trow">
        <label class="label label2" for="txtImage"><span class="required">*</span>Im&aacute;gen Producto</label>
<?php
$src = isset($info) ? UPLOAD_PATH_PRODUCTS . $info['image_name'] : '';
?>
        <img id="ajaxupload-thumb" src="<?=$src?>" alt="<?=@$info['image_name']?>" width="<?=@$info['image_width']?>" height="<?=@$info['image_height']?>" class="fleft thumbframe1 <?php if( $src=='' ) echo 'hide'?>" />
        <div class="fleft">
            <div class="fleft">
                <input type="file" id="txtImage" name="txtImage" class="ajaxupload-input" size="20" />&nbsp;
                <button id="btnUpload2" type="button" onclick="Products.upload();" class="float-left">Subir</button>
                <img id="ajaxupload-load" src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="hide" />
            </div>
            <label class="clear fleft label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg, jpeg o png)</label>
            <div id="ajaxupload-error" class="clear error span-7 hide">Este campo es obligatorio.</div>
        </div>
        <input type="hidden" name="image_old" value="<?=$src?>" />
    </div>

    <div class="trow">
        <label class="label label2"><span class="required">*</span>Galer&iacute;a de Im&aacute;genes</label>
        <div class="fleft">
            <fieldset class="gallery-panel">
                <div class="cont">
                    <ul id="gallery-image" <?php if( !isset($info) || (isset($info) && count($info['gallery'])==0) ){?>class="hide"<?php }?>>
            <?php if( isset($info) && count($info['gallery'])>0 ){?>
                <?php foreach( $info['gallery'] as $row ){?>
                        <li>
                            <a href="<?=UPLOAD_PATH_GALLERY.$row['image']?>" class="jq-image" rel="group"><img src="<?=UPLOAD_PATH_GALLERY.$row['thumb']?>" alt="<?=$row['thumb']?>" width="130" height="58" /></a>
                            <div class="d1 clear">
                                <a href="javascript:void(0)" class="link2 fleft jq-removeimg"><img src="images/icon_delete.png" alt="" width="16" height="16" />Quitar</a>
                                <a href="javascript:void(0)" class="fright handle"><img src="images/icon_arrow_move2.png" alt="" width="16" height="16" /></a>
                            </div>
                        </li>
                <?php }?>

            <?php }else{?>
                        <li>
                            <a href="" class="jq-image" rel="group"><img src="" alt="" width="" height="" /></a>
                            <div class="d1 clear">
                                <a href="javascript:void(0)" class="link2 fleft jq-removeimg"><img src="images/icon_delete.png" alt="" width="16" height="16" />Quitar</a>
                                <a href="javascript:void(0)" class="fright handle"><img src="images/icon_arrow_move2.png" alt="" width="16" height="16" /></a>
                            </div>
                        </li>
            <?php }?>
                    </ul>

                </div>
            </fieldset>

            <div class="fleft clear">
                <div class="span-10 last">
                    <input type="file" size="22" name="txtUploadFile" id="txtUploadFile" />&nbsp;
                    <button id="btnUpload" type="button" onclick="PictureGallery.upluad()" class="float-left">Subir</button>
                    <img id="ajax-loader1" src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="hide" />
                </div>
                <div class="clear span-10"><label class="label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg, jpeg o png)</label></div>
                <div id="pg-msgerror" class="clear error span-7 hide">Este campo es obligatorio</div>
            </div>
        </div>
    </div>

    <div class="trow">
        <label class="label label2" for="txtColor"><span class="required">*</span>Color</label>
        <input type="text" name="txtColor" id="txtColor" class="input-form color" value="<?=@$info['color']?>" />
    </div>
    <?php /*if( $listProductsName ){
        $sel = isset($info) ? 0 : $listProductsName[count($listProductsName)-1]['order'];
        if( isset($info) ) $listProductsName = array_merge(array(0=>''), $listProductsName);*/
    ?>
    <!--<div class="trow">
        <label class="label label2" for="cboOrder"><span class="required">*</span>Orden</label>
        <?//=form_dropdown('cboOrder', $listProductsName, $sel, 'id="cboOrder"');?>
    </div>-->
    <?php //}?>

    <div class="trow align-center" style="margin-top:20px">
        <img src="images/ajax-loader3.gif" alt="Sending ..." width="32" height="32" style="position: relative; top:10px; right: 10px;" class="hide jq-loading" /><button type="submit" name="btnSubmit" class="jq-submit">Guardar</button>
    </div>

    <input type="hidden" name="products_id" id="products_id" value="<?=@$info['products_id']?>" />
    <input type="hidden" name="json" id="json" />
</form>

<form id="ajaxupload-form" action="<?=site_url('/panel/products/ajax_upload_products')?>" method="post" enctype="multipart/form-data" target="ifr" class="hide">
    <iframe name="ifr" id="ifr" src="about:blank" frameborder="1" style="width:800px; height: 100px; border: 1px solid red;"></iframe>
</form>

<script type="text/javascript">
<!--
    Products.initializer(<?=isset($info) ? 'true' : 'false'?>);
-->
</script>