<?php
if( isset($_modejs) ){
    $script_js[] = "plugins/jquery.ad-gallery.1.2.4/jquery.ad-gallery.pack";

}else{?>
    <link rel="stylesheet" type="text/css" href="js/plugins/jquery.ad-gallery.1.2.4/jquery.ad-gallery<?=$this->config->item('sufix_pack_css');?>.css" />
<?php }?>