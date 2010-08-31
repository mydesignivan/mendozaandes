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

<form id="form1" action="<?=site_url('/panel/myaccount/save');?>" method="post" enctype="application/x-www-form-urlencoded">
    <div class="trow">
        <label for="txtEmail" class="label label2">* Email</label>
        <input type="text" name="txtEmail" id="txtEmail" class="input-contact" value="<?=$info['email']?>" />
    </div>
    <div class="trow">
        <label for="txtCodeGM" class="label label2">* C&oacute;digo Google Map</label>
        <input type="text" name="txtCodeGM" id="txtCodeGM" class="input-contact" value='<?=$info['codegm']?>' onclick="this.select()" />
    </div>
    <div class="trow">
        <label for="txtInfo" class="label label2">Contrase&ntilde;a</label>
        <button type="button" onclick="Account.showcontapass(this);">Modificar</button>
    </div>
    <div id="contPass" class="hide">
        <div class="trow">
            <label for="txtPassOld" class="label label2">* Contrase&ntilde;a actual</label>
            <input type="password" name="txtPassOld" id="txtPassOld" class="input-contact" />
        </div>
        <div class="trow">
            <label for="txtPassNew" class="label label2">* Nueva contrase&ntilde;a</label>
            <input type="password" name="txtPassNew" id="txtPassNew" class="input-contact" />
        </div>
        <div class="trow">
            <label for="txtConfirmPass" class="label label2">* Repetir Contrase&ntilde;a</label>
            <input type="password" name="txtConfirmPass" id="txtConfirmPass" class="input-contact" />
        </div>
    </div>
    <div class="trow trow-w1">
        <img src="images/ajax-loader3.gif" alt="Sending ..." width="32" height="32" style="position: relative; top:10px; right: 10px;" class="hide jq-loading" /><input type="submit" name="btnSubmit" value="Guardar" class="jq-submit" />
    </div>
</form>

<script type="text/javascript">
<!--
    Account.initializer2();
-->
</script>