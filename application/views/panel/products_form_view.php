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

<form id="form1" action="<?=site_url('/panel/products/create/')?>" method="post" enctype="application/x-www-form-urlencoded">
    <div class="trow">
        <label class="label label2" for="txtName"><span class="required">*</span>Nombre Producto</label>
        <input type="text" id="txtName" name="txtName" class="input-form" value="<?=@$info['products_name']?>" />
    </div>
    <div class="trow">
        <label class="label label2" for="txtImage"><span class="required">*</span>Im&aacute;gen</label>
        <img id="ajaxupload-thumb" src="" alt="" width="" height="" class="fleft thumbframe1 hide" />
        <div class="fleft">
            <div class="fleft">
                <input type="file" id="txtImage" name="txtImage" class="ajaxupload-input" size="20" onchange="Products.upload(this);" />
                <img id="ajaxupload-load" src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="hide" />
            </div>
            <label class="clear fleft label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg o png)</label>
            <div id="ajaxupload-error" class="clear error hide"></div>
        </div>
    </div>
    <!--<div class="trow">
        <label class="label label2">Color</label>
    </div>-->

    <div class="trow">
        <label class="label label2"><span class="required">*</span>Galer&iacute;a de Im&aacute;genes</label>
        <div class="fleft">
            <fieldset class="gallery-panel">

                <ul id="gallery-image" <?php if( !isset($info) || (isset($info) && count($info['gallery'])==0) ){?>class="hide"<?php }?>>
        <?php if( isset($info) && count($info['gallery'])>0 ){?>
            <?php foreach( $info['gallery'] as $row ){?>
                    <li>
                        <a href="<?=UPLOAD_PATH_GALLERY.$row['image']?>" class="fleft jq-image" rel="group"><img src="<?=UPLOAD_PATH_GALLERY.$row['thumb']?>" alt="<?=$row['thumb']?>" width="<?=$row['width']?>" height="<?=$row['height']?>" /></a>
                        <div class="clear">
                            <a href="javascript:void(0)" class="link2 fleft jq-removeimg">Quitar</a>
                            <a href="javascript:void(0)" class="fright handle"><img src="images/icon_arrow_move2.png" alt="" width="16" height="16" /></a>
                        </div>
                    </li>
            <?php }?>

        <?php }else{?>
                    <li>
                        <a href="" class="fleft jq-image" rel="group"><img src="" alt="" width="100" height="" /></a>
                        <div class="clear">
                            <a href="javascript:void(0)" class="link2 fleft jq-removeimg">Quitar</a>
                            <a href="javascript:void(0)" class="fright handle"><img src="images/icon_arrow_move2.png" alt="" width="16" height="16" /></a>
                        </div>
                    </li>
        <?php }?>
                </ul>
            </fieldset>

            <div class="fleft clear">
                <div class="fleft">
                    <input type="file" size="22" name="txtUploadFile" id="txtUploadFile" />
                    <button id="btnUpload" type="button" onclick="PictureGallery.upluad()" class="float-left">Subir</button>
                    <img id="ajax-loader1" src="images/ajax-loader4.gif" alt="Loading..." width="43" height="11" class="hide" />
                </div>
                <label class="clear fleft label-leyend">M&aacute;ximo 2 megas por foto (gif, jpg o png)</label>
                <div id="pg-msgerror" class="clear error hide"></div>
            </div>
        </div>
    </div>

    <div class="trow">
        <label class="label label2" for="txtContent"><span class="required">*</span>Contenido</label>
        <div class="fleft">
            <textarea id="txtContent" name="txtContent" cols="5" rows="22" class="textarea-info"><?=@$info['content']?></textarea>
            <div id="msgbox1" class="clear error prepend-top hide" style="width:200px">Este campo es obligatorio</div>
        </div>
    </div>

    <?php if( $listProductsName ){
        $sel = isset($info) ? $info['order'] : $listProductsName[count($listProductsName)-1]['order'];
    ?>
    <div class="trow">
        <label class="label label2" for="cboOrder"><span class="required">*</span>Insertar despues de</label>
        <?=form_dropdown('cboOrder', $listProductsName, $sel, 'id="cboOrder"');?>
    </div>
    <?php }?>

    <div class="trow align-center">
        <img src="images/ajax-loader3.gif" alt="Sending ..." width="32" height="32" style="position: relative; top:10px; right: 10px;" class="hide jq-loading" /><button type="submit" name="btnSubmit" class="jq-submit">Guardar</button>
    </div>
</form>

<form id="ajaxupload-form" action="<?=site_url('/panel/products/ajax_upload_products')?>" method="post" enctype="multipart/form-data" target="ifr">
    <iframe name="ifr" id="ifr" src="about:blank" frameborder="1" style="width:800px; height: 100px; border: 1px solid red;"></iframe>
</form>

<script type="text/javascript">
<!--
    Products.initializer();
-->
</script>