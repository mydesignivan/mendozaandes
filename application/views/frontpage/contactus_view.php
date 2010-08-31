<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if( $this->session->flashdata('status_sendmail')=="ok" ){?>
<div class="success">
    Thank you very much to communicate, we will contact you shortly.
</div>
<?php }elseif( $this->session->flashdata('status_sendmail')=="error" ){?>
<div class="error">
    The formuarlio could not be sent, please try again.
</div>
<?php }?>

<div class="span-11">
    <form id="form1" action="<?=site_url('/contact-us/send/');?>" method="post" enctype="application/x-www-form-urlencoded">
        <div class="trow">
            <label for="txtName" class="label label1">* Name</label>
            <input type="text" name="txtName" id="txtName" class="input-contact" />
        </div>
        <div class="trow">
            <label for="txtEmail" class="label label1">* E-mail</label>
            <input type="text" name="txtEmail" id="txtEmail" class="input-contact" />
        </div>
        <div class="trow">
            <label for="txtMessage" class="label label1">* Message</label>
            <textarea name="txtMessage" id="txtMessage" class="textarea-contact" rows="6" cols="22"></textarea>
        </div>
        <div class="trow trow-w1">
            <img src="images/ajax-loader3.gif" alt="Sending ..." width="32" height="32" style="position: relative; top:10px; right: 10px;" class="hide jq-loading" /><input type="submit" name="btnSubmit" value="Send" class="button jq-submit" />
        </div>
    </form>
</div>
<div class="fright">
    <?=$info['codegm']?>
</div>

<div class="line-dashed"></div>

<div class="clear">
    <?=$content;?>
</div>

<script type="text/javascript">
<!--
    Account.initializer();
-->
</script>